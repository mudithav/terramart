<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TIERRAMART sign in</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />


<?php
session_start();
require_once ("phpfncs/Database.php");

$db =new DBOperations();
//$fncs= new FRMOperations();
?>
</head>
<script language="javascript" src="jss/Js_Funcs.js">
</script>
<?php
require_once ("phpfncs/Database.php"); 
$db =new DBOperations();
$uname="";
$pword="";
$error = "";

if(isset($_POST['btlogin']))
{
$uname=$_POST['Username'];
$pword=$_POST['Password'];
$result=$db->Exe_Qry("SELECT * FROM login_tbl WHERE user_name ='$uname' AND password = '$pword';");
$count=$db->Row_Count($result);
if ($count==0)
{
  $error= "Username or Password is Incorrect";
}
  else
{
  $row = $db->Next_Record($result);
  $a=$row['name'];
  $b=$row['user_id'];
  $_SESSION['login_un']=$a;
  $_SESSION['login_id']=$b;
  
 }
}

if(isset($_POST['btlogout']))
{
 unset($_SESSION['login_un']);
 unset($_SESSION['login_id']);
 session_destroy();
 $uname="";
 $pword="";
}
?>
<body >


<div id="templatemo_body_wrapper">
	<div id="templatemo_wrapper">
    	
        <div id="templatemo_header">
            <div id="site_title"><h1><a href="#">TERRAMART</a></h1></div>
            <div id="templatemo_menu">
                <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="upland.php" class="current">Sign In</a></li>
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
<?php if (!isset($_SESSION['login_un']))
{ 
?>


<!-- templatemo 361 design work -->
<!-- 
Design Work Template 
http://www.templatemo.com/preview/templatemo_361_design_work 
-->

      <form id="form1" name="form1" method="post" action="" >
             <table id="wrapped2" align="center" width="750px"  border="0" cellpadding="10" cellspacing="1">
             
      <caption>
      <h2>Welcome Please Login!!!</h2>
      </caption>
      <tr>
        <td><table border="0" align="center">
            <tr>
              <th align="right">Username</th>
              <th>:</th>
              <td><input type="text" name="Username" placeholder="Username" value="<?php echo $uname; ?>"/></td>
            </tr>
            <tr>
              <th align="right">Password</th>
              <th>:</th>
              <td><input type="password" name="Password" placeholder="Password" value="<?php echo $pword; ?>"/></td>
            </tr>
            <tr>
              <td colspan="4"><table width="100%" border="0">
                  <tr>
                    <td class="tbrow" width="6%">&nbsp;</td>
                    <td class="tbrow" width="22%"><div align="center"></div></td>
                    <td class="tbrow" width="22%"><div align="center">
                        <input type="submit" value="Login" name="btlogin" id="btlogin" class="submit_btn float_l"/>
                      </div></td>
                    <td class="tbrow" width="22%"><div align="center"></div></td>
                    <td class="tbrow"  width="6%">&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <h4>  &gt;&gt;<a href="blog.php">Register|sign up</a> for new sellers</h4>
           	  <div class="cleaner"></div>
    </form>
    <?php }
else{?>
  <form id="form2" name="form2" method="post" action="" ><br />
<br />
<br />
<br />
<br />

    <table id="wrapped" align="center" width="750px"  border="0" cellpadding="10" cellspacing="1">
      <caption>
      <h2>Congratulations You've Logged In as <?php echo $_SESSION['login_un']; ?></h2>
      </caption>
      <tr>
        <td><table border="0" align="center">
            <tr>
              <td><table width="100%" border="0">
                  <tr>
                    <td class="tbrow" width="6%">&nbsp;</td>
                    <td class="tbrow" width="22%"><div align="center"></div></td>
                    <td class="tbrow" width="22%"><div align="center">
                        <input type="submit" value="Log Out" name="btlogout" id="btlogout" class="submit_btn float_l"/>
                      </div></td>
                    <td class="tbrow" width="22%"><div align="center"></div></td>
                    <td class="tbrow"  width="6%">&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </form>
  <br />
  <br />
  <?php }?>
            	<!--<div class="cbox_large float_l">
                	<h2>Log in</h2>
                	
                  <div id="signin_form">
                  <form method="post" name="signin" action="">
                        
                        <label for="author">User Name:</label> <input type="text" id="un" name="un" class="required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="email">Password:</label> <input type="text" id="psw" name="psw" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>
              
                        <input type="submit" value="Sign in" id="btlogin" name="btlogin" class="submit_btn float_l" />
						
                        
                    </form>
                    
                </div>
               
		      <div class="cleaner h20"></div>
            	</div>-->
                 
                
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