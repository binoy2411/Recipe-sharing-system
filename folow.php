<?php
session_start();
require_once "connections.php";
$id1 = $_SESSION['uid'];
$id2 = $_SESSION['fid'];

if(mysql_query("INSERT INTO follow(userid,followid) VALUES('$id1',$'id2')");
{
	header("Location: people.php");
}
else
{
	echo "Error";
}

?>