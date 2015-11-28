<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Design Work, Registration Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<!-- templatemo 361 design work -->
<!-- 
Design Work Template 
http://www.templatemo.com/preview/templatemo_361_design_work 
-->
<link rel="stylesheet" type="text/css" href="slider_styles.css" />
<script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="scripts/mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="scripts/slideitmoo-1.1.js"></script>
<script language="javascript" type="text/javascript">
	window.addEvents({
		'domready': function(){
			/* thumbnails example , div containers */
			new SlideItMoo({
						overallContainer: 'SlideItMoo_outer',
						elementScrolled: 'SlideItMoo_inner',
						thumbsContainer: 'SlideItMoo_items',		
						itemsVisible: 4,
						elemsSlide: 2,
						duration: 300,
						itemsSelector: '.SlideItMoo_element',
						itemWidth: 204,
						showControls:1});
		},
		
	});
</script>

</head>

<?php
//session_start();
/*if (isset($_SESSION[] = ['u_id']){
	}
else{
	
	
	}*/



require_once('phpfncs/Database.php');
$db =new DBOperations();
	
	if (isset($_POST['btnsubmit']))
	{
		$name = trim($_POST['txtname']);
		$email = trim($_POST['txtemail']);
		$uname = trim($_POST['txtusername']);
		$pword = trim($_POST['txtpassword']);
		$tpno = trim($_POST['txttpno']);
		$address = trim($_POST['txtaddress']);
		$city = trim($_POST['txtcity']);
		$dob = trim($_POST['txtdob']);
		
		
		$query = "INSERT INTO login_tbl SET user_name='$uname',password='$pword', name='$name', email='$email', tel_no='$tpno', address='$address', city='$city', date_of_birth='$dob'";
		$result = $db->Exe_Qry($query);
		echo 'Data uploaded';
		header("location:blog.php");
	
	}

?>


<body>

<div id="templatemo_body_wrapper">
	<div id="templatemo_wrapper">
    	
        <div id="templatemo_header">
            <div id="site_title"><h1><a href="#">seller Registration</a></h1></div>
            <div id="templatemo_menu">
                <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  
                  <li><a href="blog.php" class="current">Registration</a></li>
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
				<h2>Seller Registration</h2>
                <div id="register_form">
                  <form method="post" name="register" action="">
                        
                        <label for="name">Name:</label> <input type="text" id="txtname" name="txtname" class="required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="email">Email:</label> <input type="text" id="txtemail" name="txtemail" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="subject">Choose a username:</label> <input type="text" name="txtusername" id="txtusername" class="input_field" />
						<div class="cleaner h10"></div>
						<label for="subject">Choose a password:</label> <input type="password" name="txtpassword" id="txtpassword" class="input_field" />
						<div class="cleaner h10"></div>
						<label for="author">Telephone no:</label> <input type="text" id="txttpno" name="txttpno" class="required input_field" />
                       
                        <div class="cleaner h10"></div>
                        <label for="author">Address:</label> <input type="text" id="txtaddress" name="txtaddress" class="required input_field" />
                       
                        <div class="cleaner h10"></div>
                        <label for="author">City:</label> <input type="text" id="txtcity" name="txtcity" class="required input_field" />
                       
                        <div class="cleaner h10"></div>
                        
                        <label for="author">Date of Birth:</label> <input type="text" id="txtdob" name="txtdob" class="required input_field" />
                        <div class="cleaner h10"></div>
                        
                        <input type="submit" value="Create account" id="btnsubmit" name="btnsubmit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
                        
                    </form>
                </div>
				<div class="cleaner h30"></div>
				<div class="cleaner h30"></div>
            	</div>
            	<div class="cleaner"></div>
            </div>
            
        </div> <!-- end of main -->
        
        <div id="latest_works">
        	<h2>&nbsp;</h2>
            
        </div> <!-- end of templatemo_middle -->
    
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