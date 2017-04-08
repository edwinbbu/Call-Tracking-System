<?php
session_start();
if($_SESSION['login']!="yes")
    {
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Call Tracking System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="icon" href="favicon/favicon.ico" type="image/x-icon"/>

    
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">Call Tracking System</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="about.php">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="team.php">Our Team</a>
                    </li>
					<li>
                        <a class="page-scroll" href="employee.php">Emp Table</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="chat.php">Chat</a>
                    </li>
					<li>
                        <a class="page-scroll" href="logout.php">LogOut</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
     <section id="about">
        <div class="container">
            <div class="row">
                
                    <h2 class="section-heading">Employee List</h2>
<ol>
<li><h3><a href="emp13.php" class="employee" target="_blank">Alan George Philip</a></h3></li>
<?php
require "init.php";
$sql="select name,number,empid,email from employee where empid='r13012834';";
$result=mysqli_query($con,$sql);
if(!$result)
{
    die("Error in connection " . mysqli_connect_error());
}
else    
{
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        echo "Employee Name: ".$row['name']."<br>Phone Number: ".$row['number']."<br>Employee ID: ".$row['empid']."<br>Email: ".$row['email']."<br>";
    }
}
mysqli_close($con);
?>
<li><h3><a href="emp35.php" class="employee" target="_blank">Ashwin Dinesh</a></h3></li>
<?php
require "init.php";
$sql="select name,number,empid,email from employee where empid='r13012856';";
$result=mysqli_query($con,$sql);
if(!$result)
{
    die("Error in connection " . mysqli_connect_error());
}
else    
{
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        echo "Employee Name: ".$row['name']."<br>Phone Number: ".$row['number']."<br>Employee ID: ".$row['empid']."<br>Email: ".$row['email']."<br>";
    }
}
mysqli_close($con);
?>
<li><h3><a href="emp45.php" class="employee" target="_blank">Edwin Babu</a></h3></li>
<?php
require "init.php";
$sql="select name,number,empid,email from employee where empid='r13012866';";
$result=mysqli_query($con,$sql);
if(!$result)
{
    die("Error in connection " . mysqli_connect_error());
}
else    
{
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        echo "Employee Name: ".$row['name']."<br>Phone Number: ".$row['number']."<br>Employee ID: ".$row['empid']."<br>Email: ".$row['email']."<br>";
    }
}
mysqli_close($con);
?>
</ol>

  
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>
</div>
</div>
</section>
</body>

</html>
