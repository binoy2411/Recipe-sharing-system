<?php
session_start();
include_once 'connections.php';
$cwdir = getcwd();
if(isset($_SESSION['uname']))
{
	$fnamee = $_SESSION['uname'];
	$lasname = $_SESSION['laname'];
	$fnamee = ucfirst($fnamee);
	$lasname = ucfirst($lasname);
}

else if(!isset($_SESSION['mail']))
{
	header("HTTP/1.1 403 Forbidden");
	die();
}
?>
