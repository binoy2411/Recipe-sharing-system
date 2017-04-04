<?php
include_once 'connections.php';
mysql_close($conn);
session_start();
session_destroy();
header("Location: home.php");
?>