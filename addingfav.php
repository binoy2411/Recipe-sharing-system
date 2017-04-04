<?php
session_start();
error_reporting(0);
require_once "connections.php";
if(isset($_SESSION['mail']))
{
$maill = $_SESSION['mail'];
$info = mysql_query("SELECT * FROM users WHERE email='$maill'");
$info = mysql_fetch_assoc($info);
$id1 = $info['id'];
$recipes = mysql_query("SELECT * FROM recipe WHERE userid!='$id1'");

while($row1=mysql_fetch_row($recipes))
{
	$id2 = $row1[0];
	if(($_POST[$id2])=='Add to Favourites')
	{
		mysql_query("INSERT INTO favourites(userid,recipeid) VALUES('$id1','$id2')");
		header("Location: BrowseRecipe.php#" .$id2);
	}
	else if(($_POST[$id2])=='Remove From Favourites')
	{
		mysql_query("DELETE FROM favourites WHERE userid='$id1' AND recipeid='$id2'");
		header("Location: BrowseRecipe.php#" .$id2);
	}
}
}
else
{
	header("HTTP/1.1 403 Forbidden");
}
?>