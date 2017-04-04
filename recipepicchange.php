<?php
session_start();
$cwdir = getcwd();
if(isset($_SESSION['mail']))
{
$id = $_GET['id'];
$dir = $cwdir ."/img/recipes/";
$uploadfile = $dir . basename($_FILES['recipe_picture']['name']);

$savefile = $dir .$id ."." .pathinfo($_FILES['recipe_picture']['name'],PATHINFO_EXTENSION);
$a1 = $dir .$id .".jpg";
$a2 = $dir .$id .".png";
if($savefile == $a1)
	unlink($a2);
else unlink($a1);
if (move_uploaded_file($_FILES['recipe_picture']['tmp_name'], $savefile)) 
	{
	  header("Location: viewuploads.php#" .$id);
	}
}
else
{
	header("HTTP/1.1 403 Forbidden");
	die();
}
?> 