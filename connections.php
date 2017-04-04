<?php
$conn = mysql_connect("localhost","root","");
if(!$conn)
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("dbtest",$conn))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>