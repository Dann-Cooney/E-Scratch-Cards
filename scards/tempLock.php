
<!--
  ___________________________________________________________	
 |															 |
 |	Authors:        | Daniel Cooney                          |
 |	Start Date: 	| 2/12/17                                |
 |	Descritpion: 	| An authentication mechanism for        |
 |					| a web application                      |
 |	Last Updated: 	| Date - 09/1/18 || Time - 02:50am       |
 |	Bug Report[0]  	|                                        |  
 |___________________________________________________________|


  -->

<?php

include 'sql/db.php';

session_start();

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

	if ($counter < 5)
	{
		header("Location:login.php");
	}
}

$sql = "SELECT `Tstamp` FROM `activesession` WHERE `SessionID` = '$strForSession'";
$result = mysqli_query($conn,$sql);
if (!$result) 
{
	die('Could not query:' . mysql_error());
}
else
{
	$lastLoginAttemptTime = ($result->fetch_row()[0]);	
	date_default_timezone_set('Europe/Dublin');
	$currentTime = date('Y-m-d H:i:s');
	$differenceInSeconds = strtotime($currentTime) - strtotime($lastLoginAttemptTime);

	if((int)$differenceInSeconds <= 10) 
	{
		$locked = 1;
		$remainingDelay = 10 - $differenceInSeconds;
	}
	else
	{ 
		$locked = 0;
		$sql = "UPDATE `activesession` SET `Counter`=0, `Tstamp` = NOW() WHERE `SessionID` = '$strForSession'";
		$result = mysqli_query($conn,$sql);
		if (!$result) 
		{
			die('Could not query:' . mysql_error());
		}
	}
}
 
?>
<!DOCTYPE html>

<html>
<head>
  <title>E-Scratch Cards</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style type="text/css">
	
</style>
<body>


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
 
          </nav>
        </div>
      </div>
    </div>

<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<div class = "text-center">
									<a href="#" class="active" id="login-form-link">To Many Wrong Attemps</a>
								</div>
							</div>
							
						</div><hr>
					</div>

					<div class = "text-center">
						<div class="row">
							<div class ="col-sm-12">
								<?php

									 if($locked == 0)
									{
										echo "Please proceed";
									 	echo "<br><a href='http://localhost/scards/login.php'><span class='glyphicon glyphicon-home'></span><br>Home</a>";
									 	echo "<br>";
								 	}
									 else
									{
									 	echo"Error: Too many incorrect attempts". "<br/>";
									 	echo"Try again in: " . $remainingDelay . " seconds";
									 	echo "<br><a href='tempLock.php'><span class='glyphicon glyphicon-home'></span><br>Home</a>";
									 	echo "<br>";

									}

								?>
							</div>		
						</div>
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

<!--`/footer -->
</body>


</html>



