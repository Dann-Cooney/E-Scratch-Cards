<?php 

include 'sql/db.php';
if (isset($_POST["forgotPass"])) 
	{
		
		$objDateTime = new DateTime('NOW');
		$email = $conn->real_escape_string($_POST["email"]);
		
		$sql = "SELECT * FROM users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
    		{	
    				$dbemail = $row['email'];
					if($email == $dbemail)
					{
						$i = "1";
						break; 
					}
					else 
					{
						$i = "0";
					}
				
			}

			if($i == "1")
			{
				$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
				$str = str_shuffle($str);
				$str = substr($str, 0, 10);

				echo $email . "<br>";
				echo $dbemail . "<br>";
				$sql = "UPDATE users SET token='$str',Tstamp =NOW() WHERE Email='$dbemail'";
				session_start();
				$_SESSION["token"]=$str;

            	if (!mysqli_query($conn, $sql)) 
		            {
		                echo "Problem with creating the users table.";
		            }
		            else
		            {
		            	header("Location:changepassword.php");
        				exit();
		            }
			}
			else
			{
				$_SESSION['errMsg'] = "Please try again";
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
							<strong>
							<?php
							
					        if(!empty($_SESSION['errMsg'])) 
					        { 
					            echo $_SESSION['errMsg'];
					       	}
					        	
							?>
					        
						</strong>
							<h3><span class="glyphicon glyphicon-lock"></span></h3>
                  			<h2 class="text-center">Forgot Password?</h2>
                  			<p>You can reset your password here.</p>
                  			<div class="panel-body">
                  				<form id="forgotPass" role="form" autocomplete="off" class="form" method="post">
                  				<div class="form-group">
			                    	<div class="input-group">
			                        	<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
			                         	<input id="email" name="email" placeholder="email address" class="form-control"  type="email">
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <input name="forgotPass" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
			                    </div>
			                    </form>
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

