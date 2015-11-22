<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <style  type="text/css" media="screen"> 
		ul  li{ 
	  list-style-type:none; 
	} 
	</style> 
	 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Design Work, search Page</title>
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
                	<h2>Search  Land Details</h2>
					<p>You  may search either by district or city</p> 
	    <form  method="post" action="search.php?go"  id="searchform"> 
	      <input  type="text" name="city"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> 
		<p><a  href="?by=A">A</a> | <a  href="?by=B">B</a> | <a  href="?by=C">c</a></p> 
                	
                <div id="contact_form">
                  
                </div>
                    
					<div class="cleaner h20"></div>
</div>
            	<div class="cleaner"></div>
            </div>
            
        </div> <!-- end of main -->
    
    </div>
</div>

<?php 
	//do  something here in code 
	 if(isset($_POST['submit'])){ 
	  if(isset($_GET['go'])){ 
	  if(preg_match("/^[A-Za-z]+/", $_POST['city'])){ 
	  $dcity=$_POST['city']; 
	  //connect  to the database 
	  $db=mysql_connect  ("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error()); 
	  //-select  the database to use 
	  $mydb=mysql_select_db("terramart_db"); 
	  //-query  the database table 
	  $sql="SELECT  district, city, land_size, price, contacts, status, description FROM land_info_tbl WHERE district LIKE '%" . $dcity .  "%' OR city LIKE '%" . $dcity ."%'"; 
	  //-run  the query against the mysql query function 
	  $result=mysql_query($sql); 
	  //-create  while loop and loop through result set 
	  while($row=mysql_fetch_array($result)){ 
	          $district  =$row['district']; 
	          $city=$row['city']; 
	          $lsize=$row['land_size']; 
			  $price=$row['price']; 
			  $contacts=$row['contacts']; 
			  $status=$row['status']; 
			  $dscrpn=$row['description']; 
			  $ID=$row['id'];
	  //-display the result of the array 
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$district . " " . $city .  ""   .$lsize . ""   .$price . ""   .$contacts . ""   .$status . ""   .$dscrpn . "</a></li>\n"; 
	  echo "</ul>"; 
	  } 
	  } 
	  else{ 
	  echo  "<p>Please enter a search query</p>"; 
	  } 
	  } 
	  } 
	?> 

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
        Copyright © 2015 <a href="#">Muditha Viranga</a>
        <div class="cleaner"></div>
    </div>
</div>

</body>
</html>