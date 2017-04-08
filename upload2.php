<?php
require "init.php";
if($_POST["Client"]!="yes")
{
	echo "No Permission to access this page!";
        exit();
}
$name=$_POST["Name"];
$phone=$_POST["Phone"];
$id=$_POST["ID"];
$imei=$_POST["ime"];
$email=$_POST["Email"];

$sql="insert into employee values('$name','$phone','$imei','$id','$email');";
mysqli_query($con,$sql);
mysqli_close($con);
?>	