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
    <link rel="stylesheet" type="text/css" href="css/emp.css"/>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="icon" href="favicon/favicon.ico" type="image/x-icon"/>

    <script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
    }
</script>
<script>
    if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#datee').datepicker({ dateFormat: 'dd-mm-yy'}).datepicker({defaultDate:new Date()});
    })
}
</script>
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
                <a class="navbar-brand page-scroll">Call Tracking System</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
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
                <div id="dat">
    <p>
    <?php
    date_default_timezone_set("Asia/Calcutta");
    echo "Date:<b>".date("d-m-Y")."</b>";
    ?>
    </p>
    <?php
    require "init.php";
    $datestring=date("d-m-Y");
    if(isset($_POST['datee']))
    {
        $dategot=$_POST['datee'];
        $datestring=date('d-m-Y',strtotime($dategot));
        echo "Displaying call records of date:".$datestring;
    }
    $imei="359342067451032";
    $sql="select number,state,dat,tim from callrecord where imei=$imei and dat='$datestring';";
    $result=mysqli_query($con,$sql);
    
    if(!$result)
    {
        die("Error in connection " . mysqli_connect_error());
    }
    else    
    {
    	$count=mysqli_num_rows($result);
   		if($count==0)
   		{
   			echo "<h4>No calls made!</h4>";

   		}
   		else
   		{
   			echo "<table>
   			<tr>
   			<th>Number</th>
   			<th>State</th>
   			<th>Date</th>
   			<th>Time</th>
   			</tr>";
   			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	        {

	        	echo "<tr><td>".$row['number']."</td><td>".$row['state']."</td><td>".$row['dat']."</td><td>".$row['tim']."</td></tr>";
	        	           
	        }
   		}
        
    }
    echo "</table>";
    ?>
    </div>
    <h4>Employee name:<span style="color: blue">Ashwin Dinesh</span><br>
    Phone number:<span style="color: blue">9645260601</span></h4><br>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <h4>Input date:
    <input type="date" name="datee" id="datee" value="" />
    <input type="submit" name="ok" value="OK"/></h4><br>
    </form>
    <?php
    require "init.php";
    $imei="359342067451032";
    $sql="select count(*) from callrecord where imei='$imei' and dat='$datestring' and state='Incoming';";
    $result=mysqli_query($con,$sql);
    $tot=mysqli_fetch_row($result);
    echo "<h4>Total number of Incoming calls:<span style=\"color:blue\">".$tot[0]."</span><br>";

    $sql="select count(*) from callrecord where imei='$imei' and dat='$datestring'and state='Outgoing';";
    $result=mysqli_query($con,$sql);
    $tot=mysqli_fetch_row($result);
    echo "Total number of Outgoing calls:<span style=\"color:blue\">".$tot[0]."</span><br>";

    $sql="select count(*) from callrecord where imei='$imei' and dat='$datestring';";
    $result=mysqli_query($con,$sql);
    $tot=mysqli_fetch_row($result);
    echo "Total number of calls:<span style=\"color:blue\">".$tot[0]."</span></h4>";

    $sql="select socket from employee where imei='$imei';";
    $result=mysqli_query($con,$sql);
    $socket=mysqli_fetch_row($result);
    //echo "<h4>socket=$socket[0]</h4>";
    if($socket[0]=='0')
    {
        echo "<h4><span style=\"color:red\">Client is disconnected!</span></h4>";
    }
    else
    {
         echo "<h4><span style=\"color:blue\">Client is connected...</span></h4>";
    }
    mysqli_close($con);
    ?>    
</table>        
</div>
</div>
</section>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

      <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
