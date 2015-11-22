</html>
<h2>Search</h2> 
<body> 
<form name="search" method="post" action="<?php=$PHP_SELF?>"> 
Seach for: <input type="text" name="find" /> in  
<Select NAME="field"> 
<Option VALUE="district">District</option> 
<Option VALUE="city">City</option> 
<Option VALUE="land_size">Land Size</option> 
<Option VALUE="price">Price</option> 
<Option VALUE="contacts">Contacts</option> 
<Option VALUE="status">Status</option> 
</Select> 
<input type="hidden" name="searching" value="yes" /> 
<input type="submit" name="search" value="Search" /> 
</form>

<?php 
//This is only displayed if they have submitted the form  
if ($searching =="yes")  
{  
echo "<h2>Results</h2><p>";   
//If they did not enter a search term we give them an error  
if ($find == "")  
{  
echo "<p>You forgot to enter a search term";  
exit;  
}   
// Otherwise we connect to our Database  
mysql_connect("localhost", "root", "") or die(mysql_error());  
mysql_select_db("terramart_db") or die(mysql_error());   
// We preform a bit of filtering  
$find = strtoupper($find);  
$find = strip_tags($find);  
$find = trim ($find);   
//Now we search for our search term, in the field the user specified  
$data = mysql_query("SELECT * FROM land_info_tbl WHERE upper($field) LIKE'%$find%'");   
//And we display the results  
while($result = mysql_fetch_array( $data ))  
{  
echo $result['district'];  
echo " ";  
echo $result['city'];  
echo "<br>";  
echo $result['land_size'];  
echo "<br>"; 
echo $result['price'];  
echo "<br>";
echo $result['contacts'];  
echo "<br>";
echo $result['status'];  
echo "<br>";
echo $result['description'];  
echo "<br>";
echo "<br>";  }   
//This counts the number or results - and if there wasn't any it gives them a little message explaining that  
$anymatches=mysql_num_rows($data);  
if ($anymatches == 0)  
{  
echo "Sorry, but we can not find an entry to match your query<br><br>";  
}   
//And we remind them what they searched for  
echo "<b>Searched For:</b> " .$find;  
}  
?>
</html>