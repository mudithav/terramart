<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Design Work Template</title>
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
<?php
 @session_start();

require_once("phpfncs/Database.php"); 
$db =new DBOperations();

?>
</head>





<body>

<div id="templatemo_body_wrapper">
	<div id="templatemo_wrapper">
    	
        <div id="templatemo_header">
            <div id="site_title"><h1><a href="#">TIERRAMART</a></h1></div>
            <div id="templatemo_menu">
                <ul>
                  <li><a href="index.php" class="current">Home</a></li>
                  <li><a href="about.php">About</a></li>                  
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
                <div class="cbox_3b fp_box"><span class="b1"></span>
                   <h3>&nbsp;</h3>
                    <h4 align="center"><a href="upland.php">Upload New Advertise</a></h4>
                    <p></p>
                </div>
                <div class="cbox_3b fp_box"><span class="b2"></span>
                    <h3>&nbsp;</h3>
                    <h4 align="center"><a href="search.php">Search</a></h4>
                    <p></p>
                </div>
                <div class="cbox_3b cbox_rm fp_box"><span class="b3"></span>
                    <h3>&nbsp;</h3>
                    <?php
                    if (!isset($_SESSION['login_un']))
{
	?>
                    <h4 align="center"><a href="signin.php">Sign in</a></h4>
                    <?php
}else {
						?>
                        <h4 align="center"><a href="signin.php">Sign out(<?php echo $_SESSION['login_un']?>)</a></h4>
                        
						<?php 
						}?>
                    <p></p>
                </div>
                <div class="cleaner"></div>
            </div>
            
            <div class="cbox_fw">
            
            
            
           	  <div class="cbox_large float_l">
                	<h2>Lands for sell</h2>
                	<p></p>
					<div class="cleaner h20"></div>
                    
                  <?php
                  $Result = $db->Exe_Qry("select lname,land_id,description from land_info_tbl order by land_id DESC;");
				  if ($db->Row_Count($Result)==0)
				  {
					  ?>
					  
					  <div class="cbox_small float_l">
               	  	<h5 class="tw_bullet">No Advertisements Available yet.</h5>	                       
                    </div>
					  
					  <?php
				  }
				  else if ($db->Row_Count($Result)==1)
				  { 
				  
				  $land_data=$db->Next_Record($Result);
				  $imgpath="uploads/".$land_data['land_id'].".jpg";
				  $pagelink="ldetail.php?l=".$land_data['land_id'];
				  ?>
					  <div class="cbox_small float_l">
               	  <h5 class="tw_bullet"><?php echo $land_data['lname'];?></h5>
                    	<img src="<?php echo $imgpath;?>" alt="marketing" class="image_frame" height="100" width="280"/>
                    	<p><?php echo $land_data['description'];?></p>
                        <a href="<?php echo $pagelink;?>" class="more float_r"><span>&gt;&gt;</span> Read More</a>                       
                    </div>
                    
                     <div class="cbox_small float_l">
                    
                     <h5 >&nbsp;</h5>
                    </div>
                    
					  
					<?php  }
				  else
				  {
					  $land_data=$db->Next_Record($Result);
				  	  $imgpath="uploads/".$land_data['land_id'].".jpg";
					  $pagelink="ldetail.php?l=".$land_data['land_id'];
					  ?>
                      <div class="cbox_small float_l">
               	  <h5 class="tw_bullet"><?php echo $land_data['lname'];?></h5>
                    	<img src="<?php echo $imgpath;?>" alt="marketing" class="image_frame" height="100" width="280"/>
                    	<p><?php echo $land_data['description'];?></p>
                        <a href="<?php echo $pagelink;?>" class="more float_r"><span>&gt;&gt;</span> Read More</a>                       
                    </div>
                    <?php
					  $land_data=$db->Next_Record($Result);
				  	  $imgpath="uploads/".$land_data['land_id'].".jpg";
					  $pagelink="ldetail.php?l=".$land_data['land_id'];
					?>
                     <div class="cbox_small float_l">
                    
                     <h5 >&nbsp;</h5>
                    </div>
                    
                     <div class="cbox_small float_r">
               	  <h5 class="tw_bullet"><?php echo $land_data['lname'];?></h5>
                    	<img src="<?php echo $imgpath;?>" alt="marketing" class="image_frame" height="100" width="280"/>
                    	<p><?php echo $land_data['description'];
						?></p>
                        <a href="<?php echo $pagelink;?>" class="more float_r"><span>&gt;&gt;</span> Read More</a>                       
                    </div>
                      
                   
                    
				<!--<div class="cbox_small float_l">
               	  <h5 class="tw_bullet">Nawala</h5>
                    	<img src="images/templatemo_image_051.png" alt="marketing" class="image_frame" />
                    	<p>Situated in a friendly upmarket neighborhood.<br />
                    	  <br />
                    	  Around 500 m from the main road and access to the<br />
                    	  land by approximately 16 foot wide road.<br />
                    	  <br />
                    	  Nawala - Gunasekera Gardens<br />
                    	  08 perches – Rs 2.3 m per perch<br />
                    	  <br />
                    	  Please no brokers or telemarketers<br />
                   	    Genuine buyers are invited to inspect the property.</p>
                        <a href="#" class="more float_r"><span>&gt;&gt;</span> Read More</a>                       
                    </div>-->
                    
                    
                    
                    
                    
                    <div class="cbox_small float_l">
                    
                     <h5 >&nbsp;</h5>
                    </div>
                    
                <!--<div class="cbox_small float_l">
               	  <h5 class="tw_bullet">Mount Lavinia</h5>
                   	<img src="images/templatemo_image_052.png" alt="marketing" class="image_frame" />
                   	<p>Land for sale @ Mount Lavinia (near Galle rd 50m)<br />
                    	  <br />
                    	  • - 8.7 Perches, flat land<br />
                    	  • - Road frontage : 45 ft <br />
                    	  • - with electricity &amp; main line water supply<br />
                    	  • - 20 Feet Wide Access Road <br />
                    	  • - right-round parapet walls<br />
                    	  • - highly residential quiet neighbourhood<br />
                    	  • - The property is ideal for Residence Living Home or any suitable commercial purpose as well.<br />
               	    2.1 million , 21 Laks -per perch (Negotiable) </p>
                    <a href="#" class="more float_r"><span>&gt;&gt;</span> Read More</a>                       
                  </div>
           	  </div>-->
              
              
            	<div class="cleaner"></div>
            </div>
            
        </div> <!-- end of main -->
        
        <div id="latest_works">
        	<h2>Previous lands for sell</h2>
            <div id="SlideItMoo_outer">	
                <div id="SlideItMoo_inner">			
                    <div id="SlideItMoo_items">
                    <?php
					  $land_data=$db->Next_Record($Result);
				  	  $imgpath="uploads/".$land_data['land_id'].".jpg";
					  $pagelink="ldetail.php?l=".$land_data['land_id'];
					?>
                        <div class="SlideItMoo_element">
                        	<span></span>
                            <a href="<?php //echo $pagelink;?>"><img src="<?php echo $imgpath;?>" alt="product 1" height="80" width="195"/></a>
                        </div>	
                        <div class="SlideItMoo_element">
                        	<span></span>
                            <a href="#"><img src="images/gallery/041.png" alt="product 2" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                        	<span></span>
                            <a href="#"><img src="images/gallery/031.png" alt="product 3" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                        	<span></span>
                            <a href="#"><img src="images/gallery/041.png" alt="product 4" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                        	<span></span>
                            <a href="#"><img src="images/gallery/011.png" alt="product 5" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                        	<span></span>
                            <a href="#"><img src="images/gallery/031.png" alt="product 6" /></a>
                            
                               <?php
				  }
                  ?>
                        </div>
                    </div>			
                </div>
			</div> 
            
      	</div> <!-- end of templatemo_middle -->
    
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