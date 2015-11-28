var init = false;
var canvas;
var PathList;
var displayId = 0;
var ctx;
var pi2 = Math.PI * 2;
var markerRadius = 2;

function initialize(mode, qr, stalls) {
	if (!init) {
		canvas = document.createElement('canvas');
		ctx = canvas.getContext("2d");
		if (xmlhttp) {
			var query = "getpath?m=" + mode + "&qr=" + qr + "&stalls="
					+ escape(stalls);
			xmlhttp.open("GET", query, true);
			xmlhttp.onreadystatechange = mapResponse;
			xmlhttp.send(null);
		} else {
			alert("Browser not supported!");
		}
		init = true;
	}
}

function mapResponse() {
	if (xmlhttp.readyState == 4) {
		if (xmlhttp.status == 200) {
			PathList = eval("(" + xmlhttp.responseText + ")");
			canvas.height = 500;
			canvas.width = 1000;
			ctx.clearRect(0, 0, canvas.width, canvas.height);
			setCanvas();
		} else {
			alert(ajaxError);
		}
	}
}

function drawPathPoint(x, y, color) {
	ctx.fillStyle = color;
	ctx.beginPath();
	ctx.arc(x, y, markerRadius, 0, pi2, false);
	ctx.fill();
	ctx.lineWidth = 1;
	ctx.strokeStyle = "rgba(255, 255, 255, 0)";
	ctx.stroke();
	ctx.closePath();
}

var legend;

function placeText(x, y, color, pointId, text, position) {

	var label = "";
	if (pointId != displayId) {
		label = pointId;
	} else {
		label = text;
	}

	ctx.beginPath();
	ctx.rect(x - 2, y - 2, 4, 4);
	ctx.fillStyle = color;
	ctx.fill();
	ctx.lineWidth = 1;
	ctx.strokeStyle = 'black';
	ctx.stroke();
	ctx.closePath();

	var oldX = x;

	if ((x + label.length * 16) > canvas.width) {
		x = canvas.width - label.length * 16;
	}

	ctx.font = '20px webfont';
	ctx.strokeStyle = color;
	ctx.lineWidth = 4;
	ctx.strokeText(label, x + 5, y - 5);
	ctx.fillStyle = "rgba(255, 255, 255, .9)";
	ctx.fillText(label, x + 5, y - 5);

	if (pointId == displayId && position) {

		if ((oldX + position.length * 12) > canvas.width) {
			x = canvas.width - position.length * 12;
		}

		ctx.font = "18px Sans-serif";
		ctx.strokeStyle = color;
		ctx.lineWidth = 3;
		ctx.strokeText(position, x + 5, y + 15);
		ctx.fillStyle = "rgba(255, 255, 255, .9)";
		ctx.fillText(position, x + 5, y + 15);
	}
}

function setCanvas() {
	var colors = [ "rgba(0, 0, 0, .9)", "rgba(250, 0, 0, .9)",
			"rgba(0, 180, 0, .9)", "rgba(0, 0, 180, .9)" ];
	var cIndex = 0;

	for ( var points in PathList) {
		var mPoint = PathList[points];
		for ( var i in mPoint.pathCoordinates) {
			var node = mPoint.pathCoordinates[i];
			drawPathPoint(node[1], node[0], colors[cIndex]);
		}
		(cIndex >= 3) ? cIndex = 0 : cIndex++;
	}

	cIndex = 0;
	var pointId = 1;

	for ( var points in PathList) {
		var mPoint = PathList[points];
		placeText(mPoint.objX, mPoint.objY, colors[cIndex], pointId++,
				mPoint.label, mPoint.position);
		(cIndex >= 3) ? cIndex = 0 : cIndex++;
	}

	var mapImage = document.getElementById("mapImage");
	mapImage.src = canvas.toDataURL("image/bmp");

	var imageObj = new Image();
	imageObj.onload = function() {
		mapImage.style.backgroundImage = "url(" + imageObj.src + ")";
		mapImage.style.backgroundSize = mapImage.style.width + " "
				+ mapImage.style.height;
	};
	imageObj.src = 'images/canvasimg/background-pattern.jpg';

	var canvasRatio = mapImage.height / mapImage.width;
	var windowRatio = window.innerHeight / window.innerWidth;
	var width;
	var height;

	height = window.innerHeight - 25;
	width = height / canvasRatio;

	mapImage.style.width = width + 'px';
	mapImage.style.height = height + 'px';
}