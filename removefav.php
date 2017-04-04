<?php 
session_start();
require_once "connections.php";
if(isset($_SESSION['mail']))
{
$maill = $_SESSION['mail'];
$info = mysql_query("SELECT * FROM users WHERE email='$maill'");
$info = mysql_fetch_assoc($info);
$userid = $info['id'];
$recipes = mysql_query("SELECT * FROM recipe WHERE userid!='$userid'");

while($row1=mysql_fetch_row($recipes))
{
	$id1 = $row1[0];
	if(($_POST[$id1])=='Remove From Favourites')
	{
		mysql_query("DELETE FROM favourites WHERE userid='$userid' AND recipeid='$id1'");
		header("Location: myfavourites.php");
	}
}
}
else
{
	header("HTTP/1.1 403 Forbidden");
}
?>