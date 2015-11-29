<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
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
function loadcombos(str,ttbl,rtbl) {
var element =  document.getElementById("cmb_"+rtbl);
var eletbl =  document.getElementById("tbl_"+rtbl);
if (element != null)
{
  if (str=="New" || str=="") {
	document.getElementById("engtxt").value="";
  	document.getElementById("sintxt").value="";
	if (ttbl=="district")
	{
		document.getElementById("cmb_city").innerHTML="Select a District";
		var ele1 = document.getElementById("cmb_street");
		if (ele1 != null)
		{
		ele1.innerHTML="Select a City";
		}
		
		var ele2 = document.getElementById("cmb_gn_division");
		
		if (ele2 != null)
		{
		ele2.innerHTML="Select an Street";
		}
	}
	else if (ttbl=="city")
	{
		document.getElementById("cmb_street").innerHTML="Select a City";
		var ele3 = document.getElementById("cmb_gn_division");	
		if (ele3 != null)
		{
		ele3.innerHTML="Select an Street";
		}
	}
	else if (ttbl=="street")
	{
		document.getElementById("cmb_gn_division").innerHTML="Select an Street";
	}
	Disableadd(false);
	var tbl1 = document.getElementById("tbl_district");
	var tbl2 = document.getElementById("tbl_city");
	var tbl3 = document.getElementById("tbl_street");
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
		  if (ttbl=="district")
			{
				var ele1 = document.getElementById("cmb_street");
				if (ele1 != null)
				{
				ele1.innerHTML="Select a City";
				}
				var ele2 = document.getElementById("cmb_gn_division");
				if (ele2 != null)
				{
				ele2.innerHTML="Select an Street";
				}
			}
			else if (ttbl=="city")
			{
				var ele3 = document.getElementById("cmb_gn_division");	
				if (ele3 != null)
				{
				ele3.innerHTML="Select an Street";
				}
			}
			Disableadd(false);
			if (eletbl == null)
			{
			/*alert (eletbl);			
			alert (str+ " - "+ttbl+ " - " +rtbl);*/
				var tbl1 = document.getElementById("tbl_district");
				var tbl2 = document.getElementById("tbl_city");
				var tbl3 = document.getElementById("tbl_street");
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


</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TIERRAMART upload land</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>




<body>
<!-- templatemo 361 design work -->
<!-- 
Design Work Template 
http://www.templatemo.com/preview/templatemo_361_design_work 
-->
<div id="templatemo_body_wrapper">
	<div id="templatemo_wrapper">
    	
        <div id="templatemo_header">
            <div id="site_title"><h1><a href="#">TERRAMART</a></h1></div>
            <div id="templatemo_menu">
                <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="upland.php" class="current">Upload a new land</a></li>
                  <li><a href="blog.php">Register</a></li>
                  <li><a href="contact.php" class="last">Contact</a></li>
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
                	<h2>Upload a new Land details</h2>
                	<p>
                    
 <?php
 
 @session_start();
if (!isset($_SESSION['login_un']))
{

	
	echo '<script>location.replace("http://localhost:8080/Terramart/signin.php");</script>';
}

require_once('phpfncs/Database.php');
$db =new DBOperations();

	
	if (isset($_POST['btnsubmit']))
	{
		$lname= trim($_POST['txtlname']);
		$landsz = trim($_POST['txtlandsz']);
		$price = trim($_POST['txtprice']);
		$contact = trim($_POST['txtcontact']);
		$u_id = $_SESSION['login_id'];
		$dscrp = trim($_POST['txtdscrp']);
		$strcode = $_POST['street'];
		
		
		
		
		$query = "INSERT INTO land_info_tbl SET lname= '$lname', str_Code='$strcode',  land_size='$landsz', price='$price', contacts='$contact', status='1', description='$dscrp', user_id='$u_id'";
		
		$result = $db->Exe_Qry($query);
		
		
		
		$Result=$db->Next_Record($db->Exe_Qry("SELECT land_id FROM land_info_tbl WHERE user_id= '$u_id' AND lname = '$lname' AND str_Code='$strcode' AND  land_size='$landsz' AND price='$price' AND contacts='$contact'"));
		
		
		

		$target_file = "uploads/".$Result['land_id'].".jpg";	
		
		//echo 'Data uploaded';
		
		//Writes the photo to the server
		if(move_uploaded_file($_FILES['datafile']['tmp_name'], $target_file))
		{
		//Tells you if its all ok
		echo "The file ". basename( $_FILES['datafile']['name']). " has been uploaded, and your information has been added to the directory";
		}
		else {
		//Gives and error if its not
		echo "Sorry, there was a problem uploading your file.";
		}
		
		//header("location:index.php");
		
		
	}

?>

                    
                    
                    
                    </p>
                	<p></p>
                  <div id="upland_form">
                  <form method="POST" name="upland" id="upland" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
                        
                        <label>District:</label> <div id="cmb_district"></div>
                        <div class="cleaner h10"></div>
                        <label>City:</label> <div id="cmb_city">Select a District</div>
                        <div class="cleaner h10"></div>
                        <label>Street:</label> <div id="cmb_street">Select a City</div>
                        <div class="cleaner h10"></div>
                        <label>Land Name:</label> <input type="text" id="txtlname" name="txtlname" class="required input_field" />
                        <div class="cleaner h10"></div>
						<label >Land size:</label> <input type="text" name="txtlandsz" id="txtlandsz" class="input_field" />
						<div class="cleaner h10"></div>
        				<label > Price:</label> <input type="text" id="txtprice" name="txtprice" class="required input_field" />
                       
                        <div class="cleaner h10"></div>
                        <label >Contacts:</label> <input type="text" id="txtcontact" name="txtcontact" class="required input_field" />
                       
                        
                       
                        <div class="cleaner h10"></div>
                        <label>Brief Description:</label> <textarea id="txtdscrp" name="txtdscrp" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner h10"></div>
                        
                        <div class="cleaner h10"></div>
                        <label >Select Image:</label> <input type="file" name="datafile" size="40"> 
                         <!--<img src="datafile" alt="360 Image" border="5">-->
                        <div class="cleaner h10"></div>
						
						
                        <input type="submit" value="Next" id="btnsubmit" name="btnsubmit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
                        
						
						
                    </form>
                    <script language="javascript" type="text/javascript">
 loadcombos('NotNew',"na","district");
 </script>
                </div>
		      <div class="cleaner h20"></div>
            	</div>
            	<div class="cleaner"></div>
                
                        	<div class="cbox_fw">
                        	  <div class="cleaner"></div>
            </div>
            
            </div>
            
        </div> <!-- end of main -->
    
    </div>
</div>

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
        Copyright © 2015 @ <a href="#">Muditha Viranga</a>
        <div class="cleaner"></div>
    </div>
</div>

</body>
</html>