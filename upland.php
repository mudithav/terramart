<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TIERRAMART upload land</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>

<?php
include('dbAccess.php');

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES['datafile']['name']);	
	
	if (isset($_POST['btnsubmit']))
	{
		$district = cleanInput($_POST['txtdistrict']);
		$lcity = cleanInput($_POST['txtcity']);
		$landsz = cleanInput($_POST['txtlandsz']);
		$price = cleanInput($_POST['txtprice']);
		$contact = cleanInput($_POST['txtcontact']);
		$status = cleanInput($_POST['txtstatus']);
		$dscrp = cleanInput($_POST['txtdscrp']);
		$image = cleanInput($_POST['datafile']);
		
		
		
		$query = "INSERT INTO land_info_tbl SET district='$district',city='$lcity', land_size='$landsz', price='$price', contacts='$contact', status='$status', description='$dscrp', image='$image', user_id='2'";
		$result = executeQuery($query);
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
		
		//echo "<script type='text/javascript'>alert('submitted successfully!');</script>";
	}
/*<script language="javascript">
    alert("Record inserted successfully");
    top.location.href = "blog.php"; //the page to redirect
</script>*/
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
            <div id="site_title"><h1><a href="#">TIERRAMART</a></h1></div>
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
                <div id="mid_title">You pick the location,<br /><br />
we will take care of the rest</div>
                <p>TIERRAMART is the intelligent web service that helps you to find a suitable land according to your favour. </p>
            </div>
            <img src="images/templatemo_icon_011.png" alt="free for job" width="267" />
        </div> <!-- end of middle -->
        
        <div id="templatemo_main">
        
            <div class="cbox_fw">
            	<div class="cbox_large float_l">
                	<h2>Upload a new Land details</h2>
                	<p></p>
                	<p></p>
                  <div id="upland_form">
                  <form method="post" name="upland" action="">
                        
                        <label for="author">District:</label> <input type="text" id="txtdistrict" name="txtdistrict" class="required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="email">City:</label> <input type="text" id="txtcity" name="txtcity" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>
                        
						<label for="subject">Land size:</label> <input type="text" name="txtlandsz" id="txtlandsz" class="input_field" />
						<div class="cleaner h10"></div>
        <label for="author"> Price:</label> <input type="text" id="txtprice" name="txtprice" class="required input_field" />
                       
                        <div class="cleaner h10"></div>
                        <label for="author">Contacts:</label> <input type="text" id="txtcontact" name="txtcontact" class="required input_field" />
                       
                        <div class="cleaner h10"></div>
                        <label for="author">Status:</label> <input type="text" id="txtstatus" name="txtstatus" class="required input_field" />
                       
                        <div class="cleaner h10"></div>
                        <label for="text">Brief Description:</label> <textarea id="txtdscrp" name="txtdscrp" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner h10"></div>
                        
                        <div class="cleaner h10"></div>
                        <label for="text">Select Image:</label> <input type="file" name="datafile" size="40"> 
                         <img src="datafile" alt="360 Image" border="5">
                        <div class="cleaner h10"></div>
						
						
                        <input type="submit" value="Next" id="btnsubmit" name="btnsubmit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
                        
						
						
                    </form>
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