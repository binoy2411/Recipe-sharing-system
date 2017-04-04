<?php
session_start();
if(isset($_SESSION['imgpath']))
{
$dir = $_SESSION['imgpath'] ."/";
$uploadfile = $dir . basename($_FILES['profilepic']['name']);

$savefile = $dir ."main." .pathinfo($_FILES['profilepic']['name'],PATHINFO_EXTENSION);
$a1 = $dir ."main.jpg";
$a2 = $dir ."main.png";
if($savefile == $a1)
	unlink($a2);
else unlink($a1);
if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $savefile)) 
{
  $_SESSION['currentpic'] = $savefile;
  header("Location: ProfileUpdate.php");
} 
else 
{
   header("Location : ProfileUpdate.php");
}
}

else
{
	header("HTTP/1.1 403 Forbidden");
	die();
}

?> 