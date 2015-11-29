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
                  <li><a href="contact.php" class="last current">Search</a></li>
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
                	<h2>Search  Land Details</h2>
					<p>You  may search either by district or city or street</p> 
	    <form  method="post" action="search.php?go"  id="searchform"> 
	      <input  type="text" name="txtsearch"> 
	      <input  type="submit" name="btnsearch" value="Search"> 
	    </form> 
		
                	
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

if(isset($_POST['btnsearch'])){
$searchtxt = trim($_POST['txtsearch'])."%";
if($searchtxt != "%")
{	

require_once("phpfncs/Database.php");
$db =new DBOperations();

$Result=$db->Exe_Qry("SELECT l.land_id, l.land_size, l.price, l.lname, d.d_name, c.c_name, s.street_name FROM land_info_tbl as l, district as d, city as c, street as s WHERE l.str_Code = s.str_Code AND s.cit_Code = c.cit_Code AND c.dis_Code = d.dis_Code AND (d_name LIKE '$searchtxt' OR c_name LIKE '$searchtxt' OR street_name LIKE '$searchtxt');");
if ($db->Row_Count($Result)>0){
?>
<table width="200" align="center" border="1" width="1000px">
  <tr>
    <th scope="col" style="min-width:100px">Land Name</th>
    <th scope="col" style="min-width:100px">Size</th>
    <th scope="col" style="min-width:100px">Price</th>
    <th scope="col" style="min-width:100px">District</th>
    <th scope="col" style="min-width:100px">City</th>
    <th scope="col" style="min-width:100px">Street</th>
    <th scope="col" style="min-width:100px">&nbsp;</th>
    </tr>
    
    <?php
    while ($landraw= $db->Next_Record($Result))
	{
		
		?>
        
        <tr>
    <th scope="col" style="min-width:100px"><?php echo $landraw['3'];?></th>
    <th scope="col" style="min-width:100px"><?php echo $landraw['1'];?></th>
    <th scope="col" style="min-width:100px"><?php echo $landraw['2'];?></th>
    <th scope="col" style="min-width:100px"><?php echo $landraw['4'];?></th>
    <th scope="col" style="min-width:100px"><?php echo $landraw['5'];?></th>
    <th scope="col" style="min-width:100px"><?php echo $landraw['6'];?></th>
    <th scope="col" style="min-width:100px"><a href="<?php echo "ldetail.php?l=".$landraw['0'];?>" >read more</a></th>
    </tr>
        
        <?php
		
		
		
		}
	
	
	?>
   
</table>



<?php 
}
else {
	
	echo 'no match found';
	
	}
}
}
		
	
?>
<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
        Copyright � 2015 <a href="#">Muditha Viranga</a>
        <div class="cleaner"></div>
    </div>
</div>

</body>
</html>