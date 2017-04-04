<?php
session_start();
$pagerefer = $_SESSION['currentpage'];
require_once "connections.php";
if(isset($_SESSION['mail']))
{
$maill = $_SESSION['mail'];
$info = mysql_query("SELECT * FROM users WHERE email='$maill'");
$info = mysql_fetch_assoc($info);
$id1 = $info['id'];
$people = mysql_query("SELECT * FROM users WHERE email!='$maill' ORDER BY jointime DESC");

while($row1=mysql_fetch_row($people))
{
	$id2 = $row1[0];
	echo "Hi";
	if(($_POST[$id2])=='Follow')
	{
		mysql_query("INSERT INTO follow(userid,followid) VALUES('$id1','$id2')");
		if($pagerefer == 'people' || $pagerefer =='MyProfile')
			header("Location:" .$pagerefer .".php#" .$id2);
		else
			header("Location:" .$pagerefer);
		break;
	}
	else if(($_POST[$id2])=='Following')
	{
		mysql_query("DELETE FROM follow WHERE userid='$id1' AND followid='$id2'");
		if($pagerefer == 'people' || $pagerefer =='MyProfile')
			header("Location:" .$pagerefer .".php#" .$id2);
		else
			header("Location:" .$pagerefer);
		break;
	}
}
}
else
{
	header("HTTP/1.1 403 Forbidden");
}
?>