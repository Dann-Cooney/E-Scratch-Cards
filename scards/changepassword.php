
<!--
  ___________________________________________________________	
 |															 |
 |	Authors:        | Daniel Cooney                          |
 |	Start Date: 	| 2/12/17                                |
 |	Descritpion: 	| An authentication mechanism for        |
 |					| a web application                      |
 |	Last Updated: 	| Date - 09/1/18 || Time - 02:50am       |
 |	Bug Report[1]  |                                         |  
 |___________________________________________________________|


Bug [1] - 

  -->

<?php 

include 'sql/db.php';


//---------------Checking for account locked----- 
if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
{
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
{
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} 
else 
{
	$ip = $_SERVER['REMOTE_ADDR'];
}

$rport =  $_SERVER['REMOTE_PORT'];   
$browser = $_SERVER['HTTP_USER_AGENT'];
$strForSession = (string)$browser. (string)$ip;
session_start();
$_SESSION['errMsg'] = "";
$tokenSession = $_SESSION["token"];
$strForSession = md5($strForSession);
$_SESSION["PreAuthSess"]=$strForSession;
$strForSession = $_SESSION["PreAuthSess"];

$result = $conn->query("SELECT Counter FROM activesession WHERE SessionID='$strForSession'");

	if (!$result) 
{
	   	die('Could not query:' . mysql_error());
	}
else
	{
		$counter = ($result->fetch_row()[0]);  
		if ($counter > 4)
		{
			header("Location:tempLock.php");
			exit();
		}
	}
// --------------------------------------
if (isset($_POST["changePass"])) 
	{
		$sql = "SELECT `Tstamp` FROM `users` WHERE `token` = '$tokenSession'";
  		$result = mysqli_query($conn,$sql);
		if (!$result) 
		{
	   		die('Could not query:' . mysql_error());
		}
		else
		{
			$tokenTimeCreated = ($result->fetch_row()[0]);	
			date_default_timezone_set('Europe/Dublin');
			$currentTime = date('Y-m-d H:i:s');
			$differenceInSeconds = strtotime($currentTime) - strtotime($tokenTimeCreated);

			if((int)$differenceInSeconds > 300) 
			{
				session_destroy(); 
				header("Location:resetpassword.php");
				exit();
			}
		    else
		    {
		    	$sql = "SELECT * FROM users";
				$result = $conn->query($sql);
				//Check to see if database is empty
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) 
    				{
    					$dbuserid = $row['id'];
		    			$dbemail = $row['email'];
		    			$dbdob = $row['dob'];
		    			$dbtoken = $row['token'];

		    			$email = $conn->real_escape_string($_POST["email"]);
		    			$dob = $conn->real_escape_string($_POST["dob"]);
		    			$token = $conn->real_escape_string($_POST["token"]);
		    			$password = $conn->real_escape_string($_POST["password"]);
		    			$cpassword = $conn->real_escape_string($_POST["cpassword"]);

		    			//check if the email exists
						if($email == $dbemail && $dob == $dbdob && $token == $dbtoken && $cpassword == $password)
						{
							if ( strlen ($password) >= 8  &&  preg_match("#[0-9]+#", $password) && preg_match("#[A-Z]+#", $password) && preg_match("#[a-z]+#", $password) && preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password))
        					{
								$i = "1";
								break;
							}
							else
							{
								$_SESSION['errMsg'] = "Incorrect Password provided";
								$i = "0";
								break;
							}
						}
						else
						{
							$i = "0";
						}
    				}

    				if ($i == "1")
					{
						$newpass = $_POST['password'];
						$sql = "UPDATE users SET pass='$newpass', token ='' WHERE email='$dbemail'";
						if (!mysqli_query($conn,$sql))
						{
			    			die('Error: ' . mysqli_error($conn));
						} 
						else 
						{	
						
							$_SESSION['logMsg'] = "Password Changed: Please sign in";
							header("Location:login.php");
						}
					}
					else
					{
						$_SESSION['errMsg'] = "Incorrect information provided";
					}	
				}
				else
				{
					$_SESSION['errMsg'] = "Database is empty";
				}
		    }
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Scratch Cards</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <!-- navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="img/logo11.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
      <nav class="fill">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
        <li><a href="register.php"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>
      </ul>
      </ul>
    </nav>
    </div>
      </div>
  </div>
  <!-- /navbar -->

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="text-center">
						<a href='index.php'><span class='glyphicon glyphicon-home'></span><br>Home</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
    	<div class="row">
			<div class="col-md-4 col-md-offset-4">
				 <div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">
							<?php

							
					        if(!empty($_SESSION['errMsg'])) 
					        { 
					           echo $_SESSION['errMsg'];
					        }
					        	
							?>
					        
							<h3><span class="glyphicon glyphicon-cog"></span></h3>
                  			<h2 class="text-center">Change Password</h2>
                  			<div class="panel-body">
                  				<form id="forgotPass" role="form" autocomplete="off" class="form" method="post">
                  				<div class="form-group">
                  					 <div class="input-group">
			                        	<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
			                         	<input id="email" name="email" placeholder="email address" class="form-control"  type="email" required>
			                        </div>
			                    	<div class="input-group">
			                        	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar color-blue"></i></span>
			                         	<input id="dob" name="dob" placeholder="date of birth" class="form-control"  type="date" required>
			                        </div>
			                        <div class="input-group">
			                        	<span class="input-group-addon"><i class="glyphicon glyphicon-tag color-blue"></i></span>
			                         	<input id="token" name="token" placeholder="token" class="form-control"  type="text" required>
			                        </div>
			                        <div class="input-group">
			                        	<span class="input-group-addon"><i class="glyphicon glyphicon-wrench color-blue"></i></span>
			                         	<input id="password" name="password" placeholder="new password" class="form-control"  type="password" required>
			                        </div>
			                        <div class="input-group">
			                        	<span class="input-group-addon"><i class="glyphicon glyphicon-ok color-blue"></i></span>
			                         	<input id="cpassword" name="cpassword" placeholder="confirm password" class="form-control"  type="password" required>
			                        </div>
			                       
			                    </div>
			                    <div class="form-group">
			                        <input name="changePass" class="btn btn-lg btn-primary btn-block" value="Change Password" type="submit" required>
			                    </div>
			                    </form>
                  			</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="text-center">
						<?php
							 echo  $_SESSION["token"]; 
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<!--footer -->
 <footer class="page-footer font-small pt-4 mt-4">
    <!--Copyright-->
    <div class="footer-copyright text-center">
        © 2018 Copyright:
        <a href="index.php"> E-Scratch Cards.com </a>
    </div>
    <!--/.Copyright-->
        
   </footer>
</body>
</html>



