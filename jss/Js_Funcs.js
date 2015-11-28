var currentValue ="";
var myVar;
var searchValue = "";
var vvv1=0;
var vvv2=0;
var vvv3=0;
var hhhh=0;

function addslashes(str) 
{
  return (str + '').replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
} //addslashes
function appendimg(flpth)
{
	tinymce.activeEditor.execCommand('mceInsertContent', false, '<p><img src="'+ flpth +'" width="750" /></p>');
} //appendimg
function attachfunc(nme,soe)
{
	xmlhttp0 = xmlhttpfunc();
	xmlhttp0.onreadystatechange=function() 
	{
		if (xmlhttpcond(xmlhttp0))
		{
			var win = window.open("attachview.php");
			win.document.write(xmlhttp0.responseText);
			win.focus();
		}
	}
	xmlhttp0.open("GET","phpfncs/attldr.php?s="+soe+"&f="+nme,true);
	xmlhttp0.send();	
} //attachfunc

function checkTime(i) 
{
	if (i<10) {i = "0" + i};
	return i;
} //checkTime
function conf()
	{
		return confirm('Are You Sure to Add this Record???');
	} //conf
function confirmEdiDel()
{
	var conf = prompt("Type \"Y\" to Proceed", "N");
	if (conf == "Y" || conf == "y"){
		return true;
	}
	else {
		return false;
	}
} //confirmEdiDel

function dataloader(soe,val)
{
	if (val.slice(0,3)=="New")
	{
		if (soe=="s")
		{
			document.getElementById("F_no").value="";
			var today = new Date();
			var tdt  = (today.getFullYear()+"-"+(today.getMonth()+1)+"-"+today.getDate());
			setValue('rec_date', tdt);
			
			document.getElementById("Per_Name").value="";
			document.getElementById("Nic_no").value="";
			document.getElementById("Per_Age").value="";
			document.getElementById("Quali").value="";
			document.getElementById("Addre").value="";
			document.getElementById("Tel_no").value="";
			document.getElementById("Intro").value="";
			tinymce.activeEditor.setContent('');
			loadcombosfrms('NotNew',"na","district",soe);
			Disableadd(false);
		}
		else
		{
			var today = new Date();
			var tdt  = (today.getFullYear()+"-"+(today.getMonth()+1)+"-"+today.getDate());
			setValue('rec_date', tdt);
			document.getElementById("Addre").value="";
			document.getElementById("Requ").value="";
			document.getElementById("Submi").value="";
			setValue('sub_date', tdt);
			tinymce.activeEditor.setContent('');
			loadcombosfrms('NotNew',"na","province",soe);
			Disableadd(false);
		}
		return;
	}
	else
	{
		xmlhttp1 = xmlhttpfunc();
		xmlhttp1.onreadystatechange=function() 
		{
			if (xmlhttpcond(xmlhttp1))
			{
				var tvall = xmlhttp1.responseText.split(",!,!,");
				if (soe=="s")
				{
				document.getElementById('province').value=tvall[1];
				$("#province").trigger('change');
				vvv1 = tvall[2];
				vvv2 = tvall[3];
				setValue('rec_date', tvall[4]);
				document.getElementById("F_no").value=tvall[5];
				document.getElementById("Per_Name").value=tvall[6];
				document.getElementById("Nic_no").value=tvall[7];
				document.getElementById("Per_Age").value=tvall[8];
				document.getElementById("Quali").value=tvall[9];
				document.getElementById("Addre").value=tvall[10];
				document.getElementById("Tel_no").value=tvall[11];
				document.getElementById("Intro").value=tvall[12];
				tinymce.activeEditor.setContent('');
				tinymce.activeEditor.execCommand('mceInsertContent', false, tvall[13]);
				Disableadd(true);
				strtcombchkr();
				}
				else
				{
				document.getElementById('province').value=tvall[1];
				$("#province").trigger('change');
				vvv1 = tvall[2];
				vvv2 = tvall[3];
				vvv3 = tvall[4];
				setValue('rec_date', tvall[5]);
				document.getElementById("Addre").value=tvall[6];
				document.getElementById("Requ").value=tvall[7];
				document.getElementById("Submi").value=tvall[8];
				setValue('sub_date', tvall[9]);
				tinymce.activeEditor.setContent('');
				tinymce.activeEditor.execCommand('mceInsertContent', false, tvall[10]);	
				Disableadd(true);
				strtcombchkr();
				}
			}
		}
		xmlhttp1.open("GET","phpfncs/DtLdr.php?s="+soe+"&v="+val,true);
		xmlhttp1.send();
	}
} //dataloader
function delpic(pixname,soe)
{
	if (confirmEdiDel())
	{
		xmlhttp2 = xmlhttpfunc();
		xmlhttp2.onreadystatechange=function() 
		{
			if (xmlhttpcond(xmlhttp2))
			{
				
				alert (xmlhttp2.responseText);
				imgldr("◢",soe);
			}
		}
		xmlhttp2.open("GET","phpfncs/DelPG.php?s="+pixname.id,true);
		xmlhttp2.send();
	}
} //delpic
function Disableadd(tval)
{
	if (tval)
	{
		document.getElementById("btnAdd").disabled = true;
		document.getElementById("btnEdi").disabled = false;
		document.getElementById("btnDel").disabled = false;
	}
	else
	{
		document.getElementById("btnAdd").disabled = false;
		document.getElementById("btnEdi").disabled = true;
		document.getElementById("btnDel").disabled = true;
	}
} //Disableadd

function filecombldr(soe)
{
	xmlhttp3 = xmlhttpfunc();
	xmlhttp3.onreadystatechange=function() 
	{
		if (xmlhttpcond(xmlhttp3))
		{
			document.getElementById("cmb_file_no").innerHTML=xmlhttp3.responseText;
			loadcombosfrms('NotNew',"na","province",soe);
		}
	}
	xmlhttp3.open("GET","phpfncs/frmcombldr.php?s="+soe,true);
	xmlhttp3.send();
} //filecombldr
function filtdata(soe,elmnt)
{
	if (soe=='s')
	{
		var val0 = document.getElementById('num_txt').value.trim();
		var val01 = document.getElementById('pro_txt').value.trim();
		var val1 = document.getElementById('dis_txt').value.trim();
		var val2 = document.getElementById('ele_txt').value.trim();
		var val3 = document.getElementById('rdt_txt').value.trim();
		var val4 = document.getElementById('fno_txt').value.trim();
		var val5 = document.getElementById('nme_txt').value.trim();
		var val6 = document.getElementById('nic_txt').value.trim();
		var val7 = document.getElementById('age_txt').value.trim();
		var val8 = document.getElementById('qua_txt').value.trim();
		var val9 = document.getElementById('adr_txt').value.trim();
		var val10 = document.getElementById('tel_txt').value.trim();
		var val11 = document.getElementById('int_txt').value.trim();
		sql="SELECT * FROM sin_form ";
		if (val0.length>0 || val01.length>0 || val1.length>0 || val2.length>0 || val3.length>0 || val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0 || val10.length>0 || val11.length>0)
		{
			sql+="WHERE ";
		}
		if (val0.length>0)
		{
			sql+="Sin_Frm_Code LIKE '"+val0+"%' ";
			if (val01.length>0 || val1.length>0 || val2.length>0 || val3.length>0 || val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0 || val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val01.length>0)
		{
			sql+="pro_Code IN (SELECT pro_Code FROM province WHERE Sin_Nme LIKE '"+val01+"%') ";
			if (val1.length>0 || val2.length>0 || val3.length>0 || val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0 || val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val1.length>0)
		{
			sql+="dis_Code IN (SELECT dis_Code FROM district WHERE Sin_Nme LIKE '"+val1+"%') ";
			if (val2.length>0 || val3.length>0 || val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0 || val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val2.length>0)
		{
			sql+="ele_Code IN (SELECT ele_Code FROM electorate WHERE Sin_Nme LIKE '"+val1+"%') ";
			if (val3.length>0 || val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0 || val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val3.length>0)
		{
			sql+="R_Date LIKE '"+val3+"%' ";
			if (val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0 || val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val4.length>0)
		{
			sql+="File_No LIKE '"+val4+"%' ";
			if (val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0 || val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val5.length>0)
		{
			sql+="Name LIKE '"+val5+"%' ";
			if (val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0 || val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val6.length>0)
		{
			sql+="NIC_No LIKE '"+val6+"%' ";
			if (val7.length>0 || val8.length>0 || val9.length>0 || val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val7.length>0)
		{
			sql+="Age LIKE '"+val7+"%' ";
			if (val8.length>0 || val9.length>0 || val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val8.length>0)
		{
			sql+="Qualification LIKE '"+val8+"%' ";
			if (val9.length>0 || val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val9.length>0)
		{
			sql+="Address LIKE '"+val9+"%' ";
			if (val10.length>0 || val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val10.length>0)
		{
			sql+="Tele LIKE '"+val10+"%' ";
			if (val11.length>0)
			{
				sql+="AND ";
			}
		}
		if (val11.length>0)
		{
			sql+="Introducer LIKE '"+val11+"%' ";
		}
		sql+="ORDER BY Sin_Frm_Code DESC";
	}
	else
	{
		var val0 = document.getElementById('num_txt').value.trim();
		var val1 = document.getElementById('pro_txt').value.trim();
		var val2 = document.getElementById('dis_txt').value.trim();
		var val3 = document.getElementById('ele_txt').value.trim();
		var val4 = document.getElementById('gnd_txt').value.trim();
		var val5 = document.getElementById('rdt_txt').value.trim();
		var val6 = document.getElementById('adr_txt').value.trim();
		var val7 = document.getElementById('rqt_txt').value.trim();
		var val8 = document.getElementById('sut_txt').value.trim();
		var val9 = document.getElementById('sdt_txt').value.trim();
		sql="SELECT * FROM eng_form ";
		if (val0.length>0 || val1.length>0 || val2.length>0 || val3.length>0 || val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0)
		{
			sql+="WHERE ";
		}
		if (val0.length>0)
		{
			sql+="Eng_Frm_Code LIKE '"+val0+"%' ";
			if (val1.length>0 || val2.length>0 || val3.length>0 || val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0)
			{
				sql+="AND ";
			}
		}
		if (val1.length>0)
		{
			sql+="pro_Code IN (SELECT pro_Code FROM province WHERE Eng_Nme LIKE '"+val1+"%') ";
			if (val2.length>0 || val3.length>0 || val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0)
			{
				sql+="AND ";
			}
		}
		if (val2.length>0)
		{
			sql+="dis_Code IN (SELECT dis_Code FROM district WHERE Eng_Nme LIKE '"+val2+"%') ";
			if (val3.length>0 || val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0)
			{
				sql+="AND ";
			}
		}
		if (val3.length>0)
		{
			sql+="ele_Code IN (SELECT ele_Code FROM electorate WHERE Eng_Nme LIKE '"+val3+"%') ";
			if (val4.length>0 || val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0)
			{
				sql+="AND ";
			}
		}
		if (val4.length>0)
		{
			sql+="gn__Code IN (SELECT gn__Code FROM gn_division WHERE Eng_Nme LIKE '"+val4+"%') ";
			if (val5.length>0 || val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0)
			{
				sql+="AND ";
			}
		}
		if (val5.length>0)
		{
			sql+="R_Date LIKE '"+val5+"%' ";
			if (val6.length>0 || val7.length>0 || val8.length>0 || val9.length>0)
			{
				sql+="AND ";
			}
		}
		if (val6.length>0)
		{
			sql+="Address LIKE '"+val6+"%' ";
			if (val7.length>0 || val8.length>0 || val9.length>0)
			{
				sql+="AND ";
			}
		}
		if (val7.length>0)
		{
			sql+="Request LIKE '"+val7+"%' ";
			if (val8.length>0 || val9.length>0)
			{
				sql+="AND ";
			}
		}
		if (val8.length>0)
		{
			sql+="Submit LIKE '"+val8+"%' ";
			if (val9.length>0)
			{
				sql+="AND ";
			}
		}
		if (val9.length>0)
		{
			sql+="S_Date LIKE '"+val9+"%' ";
		}
		sql+="ORDER BY Eng_Frm_Code DESC";
	}
	xmlhttp4 = xmlhttpfunc();
	xmlhttp4.onreadystatechange=function() 
	{
		if (xmlhttpcond(xmlhttp4))
		{
			document.getElementById('frmtbl').innerHTML=xmlhttp4.responseText;
			
			document.getElementById('num_txt').value = val0;
			if (soe=='s')
	{
		document.getElementById('dis_txt').value = val1;
		document.getElementById('pro_txt').value = val01;
		document.getElementById('ele_txt').value = val2;
		document.getElementById('rdt_txt').value = val3;
		document.getElementById('fno_txt').value = val4;
		document.getElementById('nme_txt').value = val5;
		document.getElementById('nic_txt').value = val6;
		document.getElementById('age_txt').value = val7;
		document.getElementById('qua_txt').value = val8;
		document.getElementById('adr_txt').value = val9;
		document.getElementById('tel_txt').value = val10;
		document.getElementById('int_txt').value = val11;
	}
	else
	{
		 document.getElementById('pro_txt').value = val1;
		 document.getElementById('dis_txt').value = val2;
		 document.getElementById('ele_txt').value = val3;
		 document.getElementById('gnd_txt').value = val4;
		 document.getElementById('rdt_txt').value = val5;
		 document.getElementById('adr_txt').value = val6;
		 document.getElementById('rqt_txt').value = val7;
		 document.getElementById('sut_txt').value = val8;
		 document.getElementById('sdt_txt').value = val9;
	}
	document.getElementById(elmnt).focus();
		}
	}
	xmlhttp4.open("GET","phpfncs/tblloaderfrm.php?s="+soe+"&q="+sql,true);
	xmlhttp4.send();
} //filtdata
function frmInsUpdDel(soe,iud)
{
	if (iud == "i")
	{
		var tesst = conf();
		var vv1 = document.getElementById('Rec_Nos').value.slice(3);
	}
	else
	{
		var tesst = confirmEdiDel();
		var vv1 = document.getElementById('Rec_Nos').value;
	}
	if (tesst)
	{
		if (soe == "s")
		{
			
			var vv2 = document.getElementById('province').value;
			var vv3 = document.getElementById('district').value;
			var vv4 = document.getElementById('electorate').value;
			var vv5 = document.getElementById('rec_date').value;
			var vv6 = document.getElementById("F_no").value;
			var vv7 = document.getElementById("Per_Name").value;
			var vv8 = document.getElementById("Nic_no").value;
			var vv9 = document.getElementById("Per_Age").value;
			var vv10 = document.getElementById("Quali").value;
			var vv11 = document.getElementById("Addre").value;
			var vv12 = document.getElementById("Tel_no").value;
			var vv13 = document.getElementById("Intro").value;
			var vv14 = tinyMCE.activeEditor.getContent();
			if (iud == "i")
			{
				var ssqqll = "INSERT INTO sin_form VALUES('"+vv1+"','"+vv2+"','"+vv3+"','"+vv4+"','"+vv5+"','"+vv6+"','"+vv7+"','"+vv8+"','"+vv9+"','"+vv10+"','"+vv11+"','"+vv12+"','"+vv13+"');";
				var ssqqll2 = "INSERT INTO sin_attachs VALUES('"+vv1+"','"+vv14+"');";
			}
			else if (iud == "u")
			{
				var ssqqll = "UPDATE sin_form SET pro_Code='"+vv2+"',dis_Code='"+vv3+"',ele_Code='"+vv4+"',R_Date='"+vv5+"',File_No='"+vv6+"',Name='"+vv7+"',NIC_No='"+vv8+"',Age='"+vv9+"',Qualification='"+vv10+"',Address='"+vv11+"',Tele='"+vv12+"',Introducer='"+vv13+"' WHERE Sin_Frm_Code='"+vv1+"';";
				var ssqqll2 = "UPDATE sin_attachs SET Attach_Desc='"+vv14+"' WHERE Sin_Frm_Code='"+vv1+"';";
			}
			else
			{
				var ssqqll = "DELETE FROM sin_form WHERE Sin_Frm_Code='"+vv1+"'";
				var ssqqll2 = "OMIT";
			}
		}
		else
		{
			var vv2 = document.getElementById('province').value;
			var vv3 = document.getElementById('district').value;
			var vv4 = document.getElementById('electorate').value;
			var vv5 = document.getElementById('gn_division').value;
			var vv6 = document.getElementById("rec_date").value;
			var vv7 = document.getElementById("Addre").value;
			var vv8 = document.getElementById("Requ").value;
			var vv9 = document.getElementById("Submi").value;
			var vv10 = document.getElementById("sub_date").value;
			var vv11 = tinyMCE.activeEditor.getContent();
			if (iud == "i")
			{
				var ssqqll = "INSERT INTO eng_form VALUES('"+vv1+"','"+vv2+"','"+vv3+"','"+vv4+"','"+vv5+"','"+vv6+"','"+vv7+"','"+vv8+"','"+vv9+"','"+vv10+"');";
				var ssqqll2 = "INSERT INTO eng_attachs VALUES('"+vv1+"','"+vv11+"');";
			}
			else if (iud == "u")
			{
				var ssqqll = "UPDATE eng_form SET pro_Code='"+vv2+"',dis_Code='"+vv3+"',ele_Code='"+vv4+"',gn__Code='"+vv5+"',R_Date='"+vv6+"',Address='"+vv7+"',Request='"+vv8+"',Submit='"+vv9+"',S_Date='"+vv10+"' WHERE Eng_Frm_Code='"+vv1+"';";
				var ssqqll2 = "UPDATE eng_attachs SET Attach_Desc='"+vv11+"' WHERE Eng_Frm_Code='"+vv1+"';";
			}
			else
			{
				var ssqqll = "DELETE FROM eng_form WHERE Eng_Frm_Code='"+vv1+"'";
				var ssqqll2 = "OMIT";
			}
		}
		xmlhttp5 = xmlhttpfunc();
		xmlhttp5.onreadystatechange=function() 
		{
			if (xmlhttpcond(xmlhttp5))
			{
				if (xmlhttp5.responseText==true)
				{
					xmlhttp6 = xmlhttpfunc();
					xmlhttp6.onreadystatechange=function() 
					{
						if (xmlhttpcond(xmlhttp6))
						{
							if (xmlhttp6.responseText==true)
							{
								frmtblldr(soe);
								filecombldr(soe);
								$("#Rec_Nos").trigger('change');
							}
						}
						else if (iud=='u' || iud=='d')
						{
							frmtblldr(soe);
							filecombldr(soe);
							$("#Rec_Nos").trigger('change');
						}
					}
					xmlhttp6.open("GET","phpfncs/instupdtdele.php?q="+ssqqll2,true);
					xmlhttp6.send();			
				}
				else
				{
					alert(ssqqll);
					alert ("Database Was Not Updated Please Check And Try Again!!!");
				}
			}
		}
		xmlhttp5.open("GET","phpfncs/instupdtdele.php?q="+ssqqll,true);
		xmlhttp5.send();	
	}
} //frmInsUpdDel
function frmtblldr(soe)
{
	xmlhttp7 = xmlhttpfunc();
	xmlhttp7.onreadystatechange=function() 
	{
		if (xmlhttpcond(xmlhttp7))
		{
			document.getElementById('frmtbl').innerHTML=xmlhttp7.responseText;
			window.parent.document.getElementById('datafrm').click();
		}
	}
	xmlhttp7.open("GET","phpfncs/tblloaderfrm.php?s="+soe,true);
	xmlhttp7.send();
} //frmtblldr

function imgldr(imval,soe,srtxt){
	
	if (imval=="◢" || srtxt!='')
	{
		document.getElementById("imsexpa").value="◤";
		xmlhttp8 = xmlhttpfunc();
		xmlhttp8.onreadystatechange=function() 
		{
			if (xmlhttpcond(xmlhttp8))
			{
				document.getElementById("images_div").innerHTML=xmlhttp8.responseText;
				document.getElementById("imgsrch").style.visibility='visible';
			}
		}
		xmlhttp8.open("GET","phpfncs/ImgLdr.php?s="+soe+"&t="+srtxt,true);
		xmlhttp8.send();
	}
	else
	{
		document.getElementById("images_div").innerHTML="";
		document.getElementById("imgsrch").style.visibility='hidden';
		document.getElementById("imsexpa").value="◢";
	}
} //imgldr
function imgldrtst(imval,soe,srtxt){
	document.getElementById('imgsrch').value='';
	document.getElementById("imgsrch").style.visibility='hidden';
	imgldr(imval,soe,'');
} //imgldrtst
function instupdtdele(tbl)
{
if (conf())
{
	var engv = addslashes(document.getElementById("engtxt").value);
	var sinv = document.getElementById("sintxt").value;
	var qry = "";
	var refcod = "";
	var ptbl = "na";
	var refv = "na";
	if (tbl == "province")
	{
		qry = "INSERT INTO " + tbl + " (Eng_Nme, Sin_Nme) VALUES ('" + engv + "','" + sinv + "');";
	}
	else if (tbl=="district")
	{
		ptbl = "province";
	}
	else if (tbl=="electorate")
	{
		ptbl = "district";
	}
	else if (tbl=="gn_division")
	{
		ptbl = "electorate";
	}
	if (tbl!="province")
	{
		refcod = ptbl.substring(0, 3) + "_Code";
		refv = document.getElementById(ptbl).value;
		qry = "INSERT INTO " + tbl + " ( "+ refcod +", Eng_Nme, Sin_Nme) VALUES ('" + refv + "','" + engv + "','" + sinv + "');";
	}
	xmlhttp9 = xmlhttpfunc();
	xmlhttp9.onreadystatechange=function() 
	{
		if (xmlhttpcond(xmlhttp9))
		{
			if (xmlhttp9.responseText==true)
			{
				xmlhttp10 = xmlhttpfunc();
				xmlhttp10.onreadystatechange=function()
				{
					if (xmlhttpcond(xmlhttp10))
					{
						document.getElementById("tbl_"+tbl).innerHTML=xmlhttp10.responseText;
						document.getElementById("tbl_"+tbl).style.display = 'table';
						document.getElementById("engtxt").value="";
						document.getElementById("sintxt").value="";
						Disableadd(false);
						loadcombos(refv,ptbl,tbl);
					}
				}
				xmlhttp10.open("GET","phpfncs/tblloader.php?p="+refv+"&q="+ptbl+"&r="+tbl,true);
				xmlhttp10.send();
			}
			else
			{
				alert ("Couldn't Insert These Values Please Check And Try Again!!!");
			}
		}
	}
	xmlhttp9.open("GET","phpfncs/instupdtdele.php?q="+qry,true);
	xmlhttp9.send();	
}
} //instupdtdele combine Later

function loadcombos(str,ttbl,rtbl) {
var element =  document.getElementById("cmb_"+rtbl);
var eletbl =  document.getElementById("tbl_"+rtbl);
if (element != null)
{
  if (str=="New" || str=="") {
	document.getElementById("engtxt").value="";
  	document.getElementById("sintxt").value="";
	if (ttbl=="province")
	{
		document.getElementById("cmb_district").innerHTML="Select a Province";
		var ele1 = document.getElementById("cmb_electorate");
		if (ele1 != null)
		{
		ele1.innerHTML="Select a District";
		}
		
		var ele2 = document.getElementById("cmb_gn_division");
		
		if (ele2 != null)
		{
		ele2.innerHTML="Select an Electorate";
		}
	}
	else if (ttbl=="district")
	{
		document.getElementById("cmb_electorate").innerHTML="Select a District";
		var ele3 = document.getElementById("cmb_gn_division");	
		if (ele3 != null)
		{
		ele3.innerHTML="Select an Electorate";
		}
	}
	else if (ttbl=="electorate")
	{
		document.getElementById("cmb_gn_division").innerHTML="Select an Electorate";
	}
	Disableadd(false);
	var tbl1 = document.getElementById("tbl_province");
	var tbl2 = document.getElementById("tbl_district");
	var tbl3 = document.getElementById("tbl_electorate");
	var tbl4 = document.getElementById("tbl_gn_division");
	if (tbl1 != null)
	{
		tbl1.style.display = 'none';	
	}
	else if (tbl2 != null)
	{
		tbl2.style.display = 'none';	
	}
	else if (tbl3 != null)
	{
		tbl3.style.display = 'none';	
	}
	else if (tbl4 != null)
	{
		tbl4.style.display = 'none';	
	}
    return;
  } 
  xmlhttp11 = xmlhttpfunc();
  xmlhttp11.onreadystatechange=function() {
    if (xmlhttpcond(xmlhttp11)) {
		  document.getElementById("cmb_"+rtbl).innerHTML=xmlhttp11.responseText;
		  document.getElementById("engtxt").value="";
		  document.getElementById("sintxt").value="";
		  if (ttbl=="province")
			{
				var ele1 = document.getElementById("cmb_electorate");
				if (ele1 != null)
				{
				ele1.innerHTML="Select a District";
				}
				var ele2 = document.getElementById("cmb_gn_division");
				if (ele2 != null)
				{
				ele2.innerHTML="Select an Electorate";
				}
			}
			else if (ttbl=="district")
			{
				var ele3 = document.getElementById("cmb_gn_division");	
				if (ele3 != null)
				{
				ele3.innerHTML="Select an Electorate";
				}
			}
			Disableadd(false);
			if (eletbl == null)
			{
			/*alert (eletbl);			
			alert (str+ " - "+ttbl+ " - " +rtbl);*/
				var tbl1 = document.getElementById("tbl_province");
				var tbl2 = document.getElementById("tbl_district");
				var tbl3 = document.getElementById("tbl_electorate");
				var tbl4 = document.getElementById("tbl_gn_division");
				if (tbl1 != null)
				{
					tbl1.style.display = 'none';	
				}
				else if (tbl2 != null)
				{
					tbl2.style.display = 'none';	
				}
				else if (tbl3 != null)
				{
					
					tbl3.style.display = 'none';	
				}
				else if (tbl4 != null)
				{
					tbl4.style.display = 'none';	
				}
			}
		}	
  }
  if (eletbl != null)
	{
		var xxxx = "END";	
	}
  else
    {
		var xxxx = "NEND";
	}
  xmlhttp11.open("GET","phpfncs/comboloader.php?p="+str+"&q="+ttbl+"&r="+rtbl+"&e="+xxxx,true);
  xmlhttp11.send();
  document.getElementById("engtxt").value="";
  document.getElementById("sintxt").value="";
  Disableadd(false);
	if (eletbl != null)
	{
		xmlhttp12 = xmlhttpfunc();
		xmlhttp12.onreadystatechange=function() {
			if (xmlhttpcond(xmlhttp12)) {
			  document.getElementById("tbl_"+rtbl).innerHTML=xmlhttp12.responseText;
			  document.getElementById("tbl_"+rtbl).style.display = 'table';
			}
		}
		xmlhttp12.open("GET","phpfncs/tblloader.php?p="+str+"&q="+ttbl+"&r="+rtbl,true);
		xmlhttp12.send();	
	}
}
else
{
	/*alert (str+ " - "+ttbl+ " - " +rtbl);*/
	if (str=="New" || str=="") {
		document.getElementById("engtxt").value="";
		document.getElementById("sintxt").value="";
		Disableadd(false);
		return;
	} 
	xmlhttp13 = xmlhttpfunc();
	xmlhttp13.onreadystatechange=function() {
		if (xmlhttpcond(xmlhttp13)) {
		  document.getElementById("txt_txts").innerHTML=xmlhttp13.responseText;
		  Disableadd(true);
		}
	}
	xmlhttp13.open("GET","phpfncs/txtloader.php?p="+str+"&q="+ttbl,true);
	xmlhttp13.send();	
}
} //loadcombos
function loadcombosfrms(str,ttbl,rtbl,soe)
{
	var element =  document.getElementById("cmb_"+rtbl);
	if (element != null)
	{
	  if (str=="New") 
	  {  
		if (ttbl == "province" || rtbl == "province")
		{
			if (soe=="s")
			{
				document.getElementById("cmb_district").innerHTML="පළාතක් තෝරන්න";
				document.getElementById("cmb_electorate").innerHTML="දිස්ත්‍රික්කයක් තෝරන්න";
			}
			else
			{
				document.getElementById("cmb_district").innerHTML="Select a Province";
				document.getElementById("cmb_electorate").innerHTML="Select a District";
				document.getElementById("cmb_gn_division").innerHTML="Select a District";
			}
		}
		else if (ttbl=="district")
		{
			if (soe=="s")
			{
				document.getElementById("cmb_electorate").innerHTML="දිස්ත්‍රික්කයක් තෝරන්න";
			}
			else
			{
				document.getElementById("cmb_electorate").innerHTML="Select a District";
				document.getElementById("cmb_gn_division").innerHTML="Select a District";
			}
		}
		else if (ttbl=="electorate")
		{
			document.getElementById("cmb_gn_division").innerHTML="Select an Electorate";
		}
		return;
	  }
	  xmlhttp14 = xmlhttpfunc();
	  xmlhttp14.onreadystatechange=function() 
	  {
		if (xmlhttpcond(xmlhttp14)) 
		{
			document.getElementById("cmb_"+rtbl).innerHTML=xmlhttp14.responseText;
			if (ttbl=="na")
			{
				if (soe=="s")
				{
					document.getElementById("cmb_district").innerHTML="පළාතක් තෝරන්න";
					document.getElementById("cmb_electorate").innerHTML="දිස්ත්‍රික්කයක් තෝරන්න";
				}
				else
				{
					document.getElementById("cmb_district").innerHTML="Select a Province";
					document.getElementById("cmb_electorate").innerHTML="Select a District";
					document.getElementById("cmb_gn_division").innerHTML="Select a District";
				}
			}
		  	else if (ttbl=="province")
			{
				if (soe=="s")
				{
					document.getElementById("cmb_electorate").innerHTML="දිස්ත්‍රික්කයක් තෝරන්න";
				}
				else
				{
					document.getElementById("cmb_electorate").innerHTML="Select a District";
					document.getElementById("cmb_gn_division").innerHTML="Select a District";
				}
			}
			else if (ttbl=="district")
			{
				document.getElementById("cmb_gn_division").innerHTML="Select an Electorate";
			}
		}
	  }
	 xmlhttp14.open("GET","phpfncs/comboloaderfrms.php?p="+str+"&q="+ttbl+"&r="+rtbl+"&s="+soe,true);
 	 xmlhttp14.send(); 
	}
} //loadcombosfrms

function mytstfunc()
{
	var body = document.body,
    html = document.documentElement;
	var height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
	if (height!=hhhh)
	{
	height += 50;
	hhhh = height;		
	window.parent.document.getElementById('datafrm').height=height+ "px";
	}
} //mytstfunc

function PrtTblLdr(soe)
{
	var grp = document.getElementById('grpcmb').value;
	var ord = document.getElementById('ordcmb').value;
	xmlhttp15 = xmlhttpfunc();
	xmlhttp15.onreadystatechange=function() 
	{
		if (xmlhttpcond(xmlhttp15))
		{
			tinymce.activeEditor.setContent('');
			tinymce.activeEditor.execCommand('mceInsertContent', false, xmlhttp15.responseText);	
		}
	}
	xmlhttp15.open("GET","phpfncs/tblloaderfrm.php?s="+soe+"&o="+ord+"&g="+grp,true);
	xmlhttp15.send();
} //PrtTblLdr

function scrollpg()
{
	document.getElementById('menubackg').scrollIntoView(); 
	mytstfunc();
} //scrollpg
function sessSet(pg)
{
	xmlhttp18 = xmlhttpfunc();
		xmlhttp18.onreadystatechange=function() 
		{
			if (xmlhttpcond(xmlhttp18))
			{
			}
		}
		xmlhttp18.open("GET","phpfncs/pgsetter.php?p="+pg,true);
		xmlhttp18.send();
} //sessSet
function startchk()
{
myVar = setInterval(function(){txtchkr()}, 100);
} //startchk
function startTime() 
{
	var today=new Date();
	var h=today.getHours();
	var m=today.getMinutes();
	var s=today.getSeconds();
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById('divclock').innerHTML = h+":"+m+":"+s;
	var t = setTimeout(function(){startTime()},1000);
} //startTime

function TextboxChanged(soe) {
	clearInterval(myVar);
	var imgs= $('#hesh').contents().find('#ttttt').val();
   if (imgs.length>0)
   {
	   var pieces = imgs.split(",");
	   var imm=" fn fn fn";
	   var i=0;
	   while (imm=pieces[i])
	   {
		   if (imm.length>0)
		   {
			   var res1 = "";
			   var res2 = "";
			   var res3 = "";
			   res1 = imm.match(/already/gi);
			   res2 = imm.match(/Error/gi);
			   res3 = imm.match(/invalid/gi);
			   if (res1 == null && res2 == null && res3 == null)
			   {
				   
				   if (soe=="s")
				   {
					   appendimg('sinuploads/'+ imm);
				   }
				   else
				   {
					   appendimg('enguploads/'+ imm);
				   }
				   imgldr("◤",soe);
			   }
			   else
			   {
				   alert(imm);
			   }
		   }
		   i++;
	   }
   }  
} //TextboxChanged
function strtcombchkr()
{
	if (vvv1!=0)
	{
	mychkr1 = setInterval(function(){combchkr1()}, 100);
	}
}
function combchkr1()
{
	var cbdis =  document.getElementById("district");
	if (cbdis != null)
	{
		cbdis.value = vvv1;
		$("#district").trigger('change');
		clearInterval(mychkr1);
		vvv1=0;
		strtcombchkr2();
	}

} //Ticker1
function strtcombchkr2()
{
	if (vvv2!=0)
	{
	mychkr2 = setInterval(function(){combchkr2()}, 100);
	}
}
function combchkr2()
{
	var cbele =  document.getElementById("electorate");
	if (cbele != null)
	{
		cbele.value = vvv2;
		$("#electorate").trigger('change');
		clearInterval(mychkr2);
		vvv2=0;
		strtcombchkr3();
	}
} //Ticker2
function strtcombchkr3()
{
	if (vvv3!=0)
	{
	mychkr3 = setInterval(function(){combchkr3()}, 100);
	}
}
function combchkr3()
{
	var cbgnd =  document.getElementById("gn_division");
	if (cbgnd != null)
	{
		cbgnd.value = vvv3;
		clearInterval(mychkr3);
		vvv3=0;
	}
} //Ticker3
function txtchkr() {
	$('#hesh').load(function() {
		currentValue = $('#hesh').contents().find('#ttttt').val();
        if (currentValue != searchValue) {
            searchValue = currentValue;
            TextboxChanged($('#hesh').contents().find('#soe').val());
        }
		});
} //txtchkr

function unico(fld)
	{
	var ssss =	document.getElementById(fld.id).value;

	if (ssss.match(/[a-zA-Z]/g)) {
		
	var	newstr=ssss.substring(0,ssss.length - 1);
	alert ("සිංහලින් පමනයි");
	fld.value=newstr;
	}
} //unico
function updatedelete(tbl,uod)
{
if (confirmEdiDel())
{
	var engv = addslashes(document.getElementById("engtxt").value);
	var sinv = document.getElementById("sintxt").value;	
	var refcod = tbl.substring(0, 3) + "_Code";
	var refv = document.getElementById(tbl).value;
	if (uod=="u")
	{	
	var qry = "UPDATE "+ tbl + " SET Eng_Nme = '" + engv + "', Sin_Nme = '" + sinv + "' WHERE " + refcod + " = '" + refv + "';";
	}
	else
	{
	var qry = "DELETE FROM "+ tbl + " WHERE " + refcod + " = '" + refv + "';";
	}
	
	xmlhttp16 = xmlhttpfunc();
	xmlhttp16.onreadystatechange=function() 
	{
		if (xmlhttpcond(xmlhttp16))
		{
			if (xmlhttp16.responseText==true)
			{
				var ptbl = "na";
				var rrefv = "na";
				if (tbl=="district")
				{
					ptbl = "province";
				}
				else if (tbl=="electorate")
				{
					ptbl = "district";
				}
				else if (tbl=="gn_division")
				{
					ptbl = "electorate";
				}
				if (tbl!="province")
				{
					rrefv = document.getElementById(ptbl).value;
				}
				xmlhttp17 = xmlhttpfunc();
				xmlhttp17.onreadystatechange=function()
				{
					if (xmlhttpcond(xmlhttp17))
					{
						document.getElementById("tbl_"+tbl).innerHTML=xmlhttp17.responseText;
						document.getElementById("tbl_"+tbl).style.display = 'table';
						document.getElementById("engtxt").value="";
						document.getElementById("sintxt").value="";
						Disableadd(false);
						loadcombos(rrefv,ptbl,tbl);
					}
				}
				xmlhttp17.open("GET","phpfncs/tblloader.php?p="+rrefv+"&q="+ptbl+"&r="+tbl,true);
				xmlhttp17.send();
			} 
		}
	}
	xmlhttp16.open("GET","phpfncs/instupdtdele.php?q="+qry,true);
	xmlhttp16.send();	
}
} //updatedelete combine Later

function xmlhttpcond(xht)
{
	if (xht.readyState==4 && xht.status==200) {
		return true;
	}
	else{
		return false;
	}
} //xmlhttpcond	
function xmlhttpfunc()
{
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    return new XMLHttpRequest();
  } else { // code for IE6, IE5
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
} //xmlhttpfunc