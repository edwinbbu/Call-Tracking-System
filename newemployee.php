<?php
session_start();
if($_SESSION['login']!="yes")
	{
		header('Location: login.php');
		exit();
	}
?>

<html>
<head>
<title>New Employee</title>
<link rel="stylesheet" type="text/css" href="css/emp.css"/>
<link rel="icon" href="favicon/favicon.ico" type="image/x-icon"/>
</head>
<body>
<table border="1px">
<tr>
<th>Name</th>
<th>Phnumber</th>
<th>IMEI</th>
<th>Employeeid</th>
<th>Email</th>
</tr>
<?php
require "init.php";
$sql="select * from employee;";
$result=mysqli_query($con,$sql);
if(!$result)
{
	die("Error in connection " . mysqli_connect_error());
}
else	
{
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		echo "<tr><td>".$row['name']."</td><td>".$row['number']."</td><td>".$row['imei']."</td><td>".$row['empid']."</td><td>".$row['email']."</td></tr>";
	}
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
