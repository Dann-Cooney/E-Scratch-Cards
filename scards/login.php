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
    </div>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-12 col-centered">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Welcome to E-Scratch Cards</div>
				<div class="panel-body">
					<form action="sql/login.php" method="post">
            <div class="row">
              <div class="col-md-12 col-xs-12 text-center">
                <div class="form-group">
                  <strong>
                    <?php
                    session_start();
                    if(isset($_SESSION['logMsg']))
                    {
                      echo $_SESSION['logMsg'];
                    };
                    ?>
                  </strong>
                </div>
              </div>
            </div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="example@example.com"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="btn btn-primary btn-lg btn-block login-button" value="Sign In">
						</div>
					</form>
         <a href="resetpassword.php">Forgot your password?</a>
                 
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
