<?php
session_start();
require "init.php";

if(isset($_POST["username"]))
{
  $username=$_POST["username"];
  
}
if(isset($_POST["password"]))
{
  $password=$_POST["password"];
}
$cusername=array();
$cpassword=array();

$sql="select username,password from login;";
$result=mysqli_query($con,$sql);
if(!$result)
{
	die("Error in connection " . mysqli_connect_error());
}
else	
{
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	      $cusername[]=$row['username'];
	      $cpassword[]=$row['password'];
	}
}
if(($cusername[0]==$username && $cpassword[0]==$password)||($cusername[1]==$username && $cpassword[1]==$password)||($cusername[2]==$username && $cpassword[2]==$password))
	{
		$_SESSION['login']="yes";
		header("Location:index.php");
		exit();
	}
mysqli_close($con);
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Call Tracking System</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
   <link rel="stylesheet" type="text/css" href="css/normalize.css">
   <link rel="stylesheet" type="text/css" href="css/login.css">
   <link rel="icon" href="favicon/favicon.ico" type="image/x-icon"/>   
        <script src="js/prefixfree.min.js"></script>
 
  </head>
  <body>
    <div class="wrapper">
  <form name="form" class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <p class="title">Call Tracking System</p>
    <input type="text" placeholder="Username" name="username" autofocus/>
    <i class="fa fa-user"></i>
    <input type="password" placeholder="Password" name="password" />
    <i class="fa fa-key"></i>
    <button>
     <span class="state">Log in</span>
    </button>
  </form>
  </p>
</div>
          
  </body>
</html>
	
