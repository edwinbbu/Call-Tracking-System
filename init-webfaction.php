<?php
$host = "web511.webfaction.com";
$user = "calltracking";
$password="calltracking66";
$db = "calltracking";

$con = mysqli_connect($host,$user,$password,$db);

if(!$con)
{
	die("Error in connection " . mysqli_connect_error());
}
?>