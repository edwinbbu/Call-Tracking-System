<?php
require "init.php";
if($_POST["Client"]!="yes")
{
	echo "No Permission to access this page!";
        exit();
}
$number=$_POST["Incoming_Number"];
$state=$_POST["State"];
$dat=$_POST["Dat"];
$tim=$_POST["Time"];
$imei=$_POST["ime"];

$sql="insert into callrecord values('$number','$state','$dat','$tim','$imei');";
mysqli_query($con,$sql);
mysqli_close($con);
?>
