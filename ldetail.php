<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Design Work, Contact Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jss/ajax.js"></script>
<script type="text/javascript" src="jss/map.js"></script>
<style>
			body{
				margin: 0;
			}
			canvas{
				width: 100%;
				height: 100%
			}
		</style>
		<script src="jss/three.min.js"></script>
</head>
<?php
session_start();
require_once 'libs/twitteroauth.php';
 
define('CONSUMER_KEY', 'BHw60P1LffQ7EWAXo6CXqPxnf');
define('CONSUMER_SECRET', 'B6R0ysJai4yp1gxhwht8xugTwH5MBvIN89zSQUTGLuEtAo6dMJ');
define('ACCESS_TOKEN', '1649757685-ULl3ncUtqXhPuB3ThZxbl4DanCu4KRjaGE2ZIrd');
define('ACCESS_TOKEN_SECRET', 'KBBNXCoJNLGWBhgKh8Wb8EcuU4N2oIl1CpaJN1YS6WrC5');

if (!isset($_SESSION['landId']))
{
	$_SESSION['landId']=$_GET['l'];
}
else
{
	if (isset($_GET['l']))
	{
		if ($_GET['l']!=$_SESSION['landId'])
		{
			$_SESSION['landId']=$_GET['l'];
		}
	}
	
}
$lid=$_SESSION['landId'];
require_once("phpfncs/Database.php");  
$db =new DBOperations();

$Result=$db->Next_Record($db->Exe_Qry("SELECT l.land_id, l.land_size, l.price, l.contacts, l.status, l.description, l.lname, d.d_name, c.c_name, s.street_name FROM land_info_tbl as l, district as d, city as c, street as s WHERE land_id ='$lid' AND l.str_Code = s.str_Code AND s.cit_Code = c.cit_Code AND c.dis_Code = d.dis_Code;"));

?>		
<body>
<!-- templatemo 361 design work -->
<!-- 
Design Work Template 
http://www.templatemo.com/preview/templatemo_361_design_work 
-->
<div id="templatemo_body_wrapper">
	<div id="templatemo_wrapper">
    	
        <div id="templatemo_header">
            <div id="site_title"><h1><a href="#">Design Work</a></h1></div>
            <div id="templatemo_menu">
                <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="blog.php">Register</a></li>
                  <li><a href="search.php">Search more</a></li>
                  <li><a href="contact.php" class="last current">Land Detail Page</a></li>
                </ul>
            </div> <!-- end of templatemo_menu -->
        </div><!-- end of header -->
        
        <div id="templatemo_middle">
            <div id="mid_left">
                <div id="mid_title">You pick the location,<br />
we will take care of the rest</div>
                <p>TERRAMART is the intelligent web service that helps you to find a suitable land according to your favour. </p>
            </div>
            <img src="images/templatemo_icon_011.png" alt="free for job" width="267" />
        </div> <!-- end of middle -->
        
        <div id="templatemo_main">
 
<div class="cbox_fw">
            	<div class="cbox_large float_l">
                	<h2><?php echo $Result['lname'];?></h2>
                	<p></p>
                <div id="contact_form">
                  
                </div>
                    
					<div class="cleaner h20"></div>
</div>


<?php
	//$land_data=$db->Next_Record($Result);
	$imgpath="uploads/".$Result['land_id'].".jpg";


?>
 			<div class="cbox_small float_l">
               	  <h5 class="tw_bullet"><?php echo $Result['lname'];?></h5>
                    	<!--<img src="" alt="marketing" class="image_frame" />-->
                        
                     <div id="sphere_div" style="width:800px; height:400px;" ></div>  
                        
                        
                      
                        
                        
                        <script>
			
			var manualControl = false;
			var longitude = 0;
			var latitude = 0;
			var savedX;
			var savedY;
			var savedLongitude;
			var savedLatitude;
			
			// panoramas background
			var panoramasArray = ["<?php echo $imgpath;?>"];
			var panoramaNumber = Math.floor(Math.random()*panoramasArray.length);
 
			// setting up the renderer
			renderer = new THREE.WebGLRenderer();
			renderer.setSize(800, 400);
			//come
			document.getElementById('sphere_div').appendChild(renderer.domElement);
			
			// creating a new scene
			var scene = new THREE.Scene();
			
			// adding a camera
			var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 1, 1000);
			camera.target = new THREE.Vector3(0, 0, 0);
 
			// creation of a big sphere geometry
			var sphere = new THREE.SphereGeometry(100, 100, 40);
			sphere.applyMatrix(new THREE.Matrix4().makeScale(-1, 1, 1));
 
			// creation of the sphere material
			var sphereMaterial = new THREE.MeshBasicMaterial();
			sphereMaterial.map = THREE.ImageUtils.loadTexture(panoramasArray[panoramaNumber])
 
			// geometry + material = mesh (actual object)
			var sphereMesh = new THREE.Mesh(sphere, sphereMaterial);
			scene.add(sphereMesh);
 
			// listeners
			document.addEventListener("mousedown", onDocumentMouseDown, false);
			document.addEventListener("mousemove", onDocumentMouseMove, false);
			document.addEventListener("mouseup", onDocumentMouseUp, false);
				
               render();
               
               function render(){
				
				requestAnimationFrame(render);
				
				if(!manualControl){
					longitude += 0.1;
				}
 
				// limiting latitude from -85 to 85 (cannot point to the sky or under your feet)
                    latitude = Math.max(-85, Math.min(85, latitude));
 
				// moving the camera according to current latitude (vertical movement) and longitude (horizontal movement)
				camera.target.x = 500 * Math.sin(THREE.Math.degToRad(90 - latitude)) * Math.cos(THREE.Math.degToRad(longitude));
				camera.target.y = 500 * Math.cos(THREE.Math.degToRad(90 - latitude));
				camera.target.z = 500 * Math.sin(THREE.Math.degToRad(90 - latitude)) * Math.sin(THREE.Math.degToRad(longitude));
				camera.lookAt(camera.target);
 
				// calling again render function
				renderer.render(scene, camera);
				
			}
			
			// when the mouse is pressed, we switch to manual control and save current coordinates
			function onDocumentMouseDown(event){
 
				event.preventDefault();
 
				manualControl = true;
 
				savedX = event.clientX;
				savedY = event.clientY;
 
				savedLongitude = longitude;
				savedLatitude = latitude;
 
 
			}
			// when the mouse moves, if in manual contro we adjust coordinates
			function onDocumentMouseMove(event){
 
				if(manualControl){
					longitude = (savedX - event.clientX) * 0.1 + savedLongitude;
					latitude = (event.clientY - savedY) * 0.1 + savedLatitude;
				}
 
			}
 
			// when the mouse is released, we turn manual control off
			function onDocumentMouseUp(event){
 
				manualControl = false;
 
			}
			
			// pressing a key (actually releasing it) changes the texture map
			document.onkeyup = function(event){
			
				panoramaNumber = (panoramaNumber + 1) % panoramasArray.length
				sphereMaterial.map = THREE.ImageUtils.loadTexture(panoramasArray[panoramaNumber])
			
    			}
			
		</script>
                        
                    <br />     <br />
                     <div class="cbox_small float_l" style="width:800px;" >
                     <p><?php echo $Result['description'];?></p>
                         <br /> 
                     </div> 
                       
                    	   
                         <p>Land Size :<?php echo $Result['land_size'];?></p>    
                          <br />    
                         <p>Price : RS <?php echo $Result['price'];?></p> 
                          <br />    
                         <p>Contact :<?php echo $Result['contacts'];?></p>                  
                    </div>




            	<div class="cleaner"></div>
            </div>
            
        </div> <!-- end of main -->
    
    <div>
    
    
    
    
    </div>
    
    
     
    
        
    
    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="642" height="443" src="https://maps.google.com/maps?hl=en&q=<?php echo $Result['street_name'];?>, <?php echo $Result['c_name'];?>&ie=UTF8&t=k&z=17&iwloc=B&output=embed">
    <div>
<small>
<a href="http://embedgooglemaps.com">embedgooglemaps.com</a>
</small>
</div>
</iframe>
    
    
    
    <div class="cleaner"><br /><br /></div>
    <div class="cbox_small float_l" style="width:800px;" >
    <h2><u>List of Social information related to Area</u></h2>
    <?php
	$rss = new DOMDocument();
	$rss->load('http://www.hirunews.lk/rss/english.xml');
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 5;

		
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		
		echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
		echo '<small><em>Posted on '.$date.'</em></small></p>';
		echo '<p>'.$description.'</p>';
		
		}
?>

    </div>
    <div class="cbox_small float_l" style="width:800px;" >
    <?php
	$rss = new DOMDocument();
	$rss->load('http://www.lankanewspapers.com/news/rss.xml');
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array (
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 10;
	if ($feed == null) echo "does not compute";
	else
	for($x=0;$x<$limit;$x++) {
		$title = str_replace("&", "&amp;", $feed[$x]["title"]);
		$link = $feed[$x]["link"];
		echo '<a href="'.$link.'" title="'.$title.'" rel="nofollow">'.$title.'</a>';
	}
?>


    </div>
    <div class="cleaner"><br /><br />
    <?php
	function search(array $query)
{
  $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
  return $toa->get('search/tweets', $query);
}
 
$query = array(
  "q" => $Result['street_name'],
  "count" => 20,
  "result_type" => "popular",
  "lang" => "en",
);

	?>
    
    </div>
    </div>
    <div class="cleaner"></div>
</div>

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
        Copyright © 2015 <a href="#">Muditha Viranga</a>
        <div class="cleaner"></div>
    </div>
</div>

</body>
</html>