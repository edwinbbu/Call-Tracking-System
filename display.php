<?php
session_start();
if($_SESSION['login']!="yes")
	{
		header('Location: login.php');
	}
?>

<html>
<head>
<title>CallRecord</title>
<link rel="stylesheet" type="text/css" href="css/emp.css"/>
<link rel="icon" href="favicon/favicon.ico" type="image/x-icon"/>
</head>
<body>
<table border="1px">
<tr>
<th>Number</th>
<th>State</th>
<th>Date</th>
<th>Time</th>
<th>IMEI</th>
</tr>
<?php
require "init.php";
$sql="select number,state,dat,tim,imei from callrecord;";
$result=mysqli_query($con,$sql);
if(!$result)
{
	die("Error in connection " . mysqli_connect_error());
}
else	
{
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		echo "<tr><td>".$row['number']."</td><td>".$row['state']."</td><td>".$row['dat']."</td><td>".$row['tim']."</td><td>".$row['imei']."</td></tr>";
	}
}
mysqli_close($con);
?>
</table>
</body>
</html>
