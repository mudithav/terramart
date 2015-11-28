<?php
$p = $_GET['p'];
$q = $_GET['q'];
$r = $_GET['r'];
$e = $_GET['e'];
require_once("Database.php");
$db=new DBOperations();
echo '<select id="'.$r.'" name="'.$r.'" ';
if ($q=="na")
{
	$s="city";
}
else if ($q=="district")
{
	$s = "street";	
}
else if ($q=="city")
{
	$s = "gn_division";
}
else if ($q=="street")
{
	$s = "ANonimusfld";
}
/*if ($q!="gn_division")
{*/
	echo 'onChange="loadcombos(this.value,'."'".$r."'".','."'".$s."'".')">';
/*}*/
if ($q=="na")
{
	$qry = "SELECT * FROM $r;";
}
else 
{
	$fld=substr($q,0,3)."_Code";
	$qry = "SELECT * FROM $r WHERE $fld='$p';";
}

if ($e=="END")
{
	echo '<option value="New">Add New One</option>';
}
else
{
	if ($r=="electorate")
	{
	echo '<option value="">Select an '.ucfirst($r).'</option>';
	}
	else
	{
		echo '<option value="">Select a '.ucfirst($r).'</option>';
	}
}
 			$res= $db->Exe_Qry($qry);
			$numb=1;
 			while($user_data=$db->Next_Record($res))
			{
			echo '<option value="'.$user_data['0'].'">'.$user_data['1'].'</option>';
			$numb++;
			}
/*         echo '<script language="javascript" type="text/javascript">
document.getElementById("'.$q.'").value="<?php echo $'.$q.'"Val"'.';?>";</script></select>';*/
$db->Disconnect_from_DB();
?>