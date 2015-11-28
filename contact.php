<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Design Work, Contact Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

</head>
<?php
//include('dbAccess.php');
require_once('phpfncs/Database.php');
$db =new DBOperations();
	
		if (isset($_POST['btnsubmit']))
	{
		$cname = trim($_POST['cname']);
		$email = trim($_POST['email']);
		$subject = trim($_POST['subject']);
		$message = trim($_POST['message']);
		
						
		$query = "INSERT INTO contact_info SET cname='$cname',cemail='$email', subject='$subject', message='$message'";
		//$result = executeQuery($query);
		$result = $db->Exe_Qry($query);
		echo "Update Successfully";
		//header("location:index.php")
		
	}	
		
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
                  <li><a href="contact.php" class="last current">Contact</a></li>
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
                	<h2>Contact Information</h2>
                	<p></p>
                <div id="contact_form">
                  <form method="post" name="contact" action="#">
                        
                        <label for="author">Name:</label> <input type="text" id="cname" name="cname" class="required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>
                        
						<label for="subject">Subject:</label> <input type="text" name="subject" id="subject" class="input_field" />
						<div class="cleaner h10"></div>
        
                        <label for="text">Message:</label> <textarea id="message" name="message" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner h10"></div>
                        
                        <input type= "submit" value="Next" id="btnsubmit" name="btnsubmit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
                        
                    </form>
                </div>
                    
					<div class="cleaner h20"></div>
</div>
            	<div class="cleaner"></div>
            </div>
            
        </div> <!-- end of main -->
    
    </div>
</div>

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
        Copyright © 2015 <a href="#">Muditha Viranga</a>
        <div class="cleaner"></div>
    </div>
</div>

</body>
</html>