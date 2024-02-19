<?php
$vxod = "Вход";
$cheking = mysqli_connect("localhost", "root", "", "edubase");
$mail = $_COOKIE['edubase_email'];
$query_command = "SELECT * FROM users WHERE mail='".$mail."'";
$result = mysql_query($query_command);
if($result)
{
	$rows = mysql_fetch_row($result);
	$id=$rows[0];
	$name=$rows[1];
	$soname=$rows[2];
	$mail=$rows[5];
	$password=$rows[4];
	$floor=$rows[3];
	$reg_date=$rows[6];
	$position=$rows[7];
	$administration=$rows[8];
	$field_of_activity=$rows[9];
	$knows_level=$rows[10];
	$image_url=$rows[11];
	if($id == $_COOKIE['edubase_id'] && $name == $_COOKIE['edubase_name'] && $id != "" && $name != "")
	{
		$vxod = "Выход";
	}
	else
	{

	}
}
mysql_close($mysqli);
?>