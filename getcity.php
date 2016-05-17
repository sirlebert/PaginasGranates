<?php
session_start();
$city= $_GET["city"];
$_SESSION["city"] = $city;
echo $_SESSION["city"]; 
echo "<script>window.close();</script>";
?>