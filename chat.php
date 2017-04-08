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
    <link rel="stylesheet" type="text/css" href="css/client.css">
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
            <div class="chat">
        <?php 
        $colours = array('007AFF','FF7000','FF7000','15E25F','CFC700','CFC700','CF1100','CF00BE','F00');
        $user_colour = '007AFF';
        ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

        <script language="javascript" type="text/javascript">  
        $(document).ready(function(){
            //create a new WebSocket object.
            //var wsUri = "ws://web511.webfaction.com:11024";   
            var wsUri = "ws://alangp66.webfactional.com/websockets/:11024";     
            websocket = new WebSocket(wsUri); 
            
            websocket.onopen = function(ev) { // connection is open 
                $('#message_box').append("<div class=\"system_msg\">Connected!</div>"); //notify user
            }

            $('#send-btn').click(function(){ //use clicks message send button   
                var mymessage = $('#message').val(); //get message text
                var myname = "Manager";

                if(mymessage == ""){ //emtpy message?
                    alert("Enter Some message Please!");
                    return;
                }
                
                //prepare json data
                var msg = {
                message: mymessage,
                name: myname,
                };
                //convert and send data to server
                websocket.send(JSON.stringify(msg));
            });
            
            //#### Message received from server?
            websocket.onmessage = function(ev) {
                var msg = JSON.parse(ev.data); //PHP sends Json data
                var type = msg.type; //message type
                var umsg = msg.message; //message text
                var uname = msg.name; //user name
                var ucolor = msg.color; //color

                if(type == 'usermsg') 
                {
                    $('#message_box').append("<div><span class=\"user_name\" style=\"color:#"+ucolor+"\">"+uname+"</span> : <span class=\"user_message\">"+umsg+"</span></div>");
                }
                if(type == 'system')
                {
                    $('#message_box').append("<div class=\"system_msg\">"+umsg+"</div>");
                }
                
                $('#message').val(''); //reset text
            };
            
            websocket.onerror   = function(ev){$('#message_box').append("<div class=\"system_error\">Error Occurred - "+ev.data+"</div>");}; 
            websocket.onclose   = function(ev){$('#message_box').append("<div class=\"system_msg\">Connection Closed</div>");}; 
        });
        </script>
        <div class="chat_wrapper">
        <div class="message_box" id="message_box"></div>
        <div class="panel2">
        <label for="message"><b>Manager</b></label>
        <input type="text" name="message" id="message" placeholder="Message" maxlength="80" style="width:69%" />
        <button id="send-btn">Send</button>
        </div>
        </div>
        </div>
    <div class="clients">
    <h1>Employees</h1>
    <li><h2>Alan George Philip</h2></li>
    <li><h2>Ashwin Dinesh</h2></li>
    <li><h2>Edwin Babu</h2></li>
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
