<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Design Work, About Us</title>
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


require_once("phpfncs/Database.php"); 
$db =new DBOperations();

?>

<body>

<div id="templatemo_body_wrapper">
	<div id="templatemo_wrapper">
    	
        <div id="templatemo_header">
            <div id="site_title"><h1><a href="#">Design Work</a></h1></div>
            <div id="templatemo_menu">
                <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php" class="current">About</a></li>
                 
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
                	<h2><span color="color_0">About</span></h2>
                	<p>The concept of experience economy states that consumers are becoming more sophisticated and expect memorable experiences when purchasing goods and experiences. Advances of technology in leaps and bounds during the past few decades also have created a digitally savvy, connected populace whose world is digitally enhanced. Consumers expect an enhanced service where the physical world is enhanced through digital services.  </p>
                	<p>The process of purchasing a block of land for building a house or other purposes is an important decision of many person's life and is often tedious and stressful. Currently, there are no systems that provide a digitally enhanced intelligent environment that can make the purchase of a land a pleasurable experience. A person wishing to purchase a land has to make several visits to the site before he can make a decision. This is because he/she is not able to make a preliminary evaluation about the suitability of the land using commonly available information such as the location of the land, its environment, other constructions around the land, the profile of the people living in the area, distance and easiness to travel to schools, hospitals and other important places and if the land is prone to flooding during rainy season. Due to lack of credible information sources, land seekers often have to make multiple visits and rely on multiple sources.</p>
					<p>This project aims to solve this problem by building an intelligent system that can help a person make an initial evaluation of a land before making further investments, either financially or time-wise. The system is composed of a set of interconnected information agents that will help a prospective land seeker identify a suitable land without making any physical visits. It will save the user time and a person can make a better decision about the suitability of the land. </p>
					<p>A prototype system was developed. The system has several agents that interact with popular social media sites to gather information. Agents communicate among themselves to collate useful information such as virtual 360 images of the land, transport information such as bus routes, background information about the neighbors of the identified land and other relevant information. A management agent will collate all the relevant information into an attractive presentation as a response to a user query. We envisage that a user is able to make an intelligent evaluation of the suitability of a land before making further commitments. Later the system will be extended to include automatic selection of suitable lands depending on user preferences.</p>
<div class="cleaner h20"></div>
            	</div>
            	<div class="cleaner"></div>
            </div>
            
        </div> <!-- end of main -->
        
        <div id="latest_works">
        	<h2></h2>
            <div id="SlideItMoo_outer">	
                <div id="SlideItMoo_inner">			
                    
      	</div> <!-- end of templatemo_middle -->
    
    </div>
</div>

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
        Copyright © 2015 @  <a href="#">Muditha Viranga</a>
        <div class="cleaner"></div>
    </div>
</div>

</body>
</html>