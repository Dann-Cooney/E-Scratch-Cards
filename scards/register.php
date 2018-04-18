

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>
      </ul>
      </ul>
    </nav>
    </div>
      </div>
  </div>
  <!-- /navbar -->
  <div class="container">

  <div class="row">
      <div class="col-md-6 col-xs-12 col-centered">
        <div class="panel panel-primary">
          <div class="panel-heading">Register To E-Scratch Cards</div>
            <div class="panel-body">
              <form action="sql/register.php" method="post">
                <div class="row">
                  <div class="col-md-12 col-xs-12 text-center">
                    <div class="form-group">
                      <strong>
                      <?php
                      session_start();
                       if(isset($_SESSION['here']))
                      {
                        echo $_SESSION['here'];
                      };  ?>
                    </strong>
                    </div>
                  </div>
                 </div>
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="name" class="cols-sm-2 control-label">First Name</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="fname" id="fname" placeholder="Joe" required/>
                        </div>
                    </div>
                  </div>
              
                   <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="name" class="cols-sm-2 control-label">Last Name</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="lname" id="lname"  placeholder="Bloggs" required/>
                        </div>
                    </div>
                  </div>
                  
                </div>


               <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                      <label for="name" class="cols-sm-2 control-label">Email Address</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required />
                        </div>
                    </div>
                  </div>
              </div>

               <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="name" class="cols-sm-2 control-label">Date Of Birth</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                          <input type="date" class="form-control" name="dob" id="dob">
                        </div>
                    </div>
                  </div>
      
            
                   <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="name" class="cols-sm-2 control-label">County</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true" required></i></span>
                          <select id="soflow" name="county">
                            <option selected="selected">Please Select A County</option>
                            <option value="antrim">Antrim</option>
                            <option value="armagh">Armagh</option>
                            <option value="carlow">Carlow</option>
                            <option value="cavan">Cavan</option>
                            <option value="clare">Clare</option>
                            <option value="cork">Cork</option>
                            <option value="derry">Derry</option>
                            <option value="donegal">Donegal</option>
                            <option value="down">Down</option>
                            <option value="dublin">Dublin</option>
                            <option value="fermanagh">Fermanagh</option>
                            <option value="galway">Galway</option>
                            <option value="kerry">Kerry</option>
                            <option value="kildare">Kildare</option>
                            <option value="kilkenny">Kilkenny</option>
                            <option value="laois">Laois</option>
                            <option value="leitrim">Leitrim</option>
                            <option value="limerick">Limerick</option>
                            <option value="longford">Longford</option>
                            <option value="louth">Louth</option>
                            <option value="mayo">Mayo</option>
                            <option value="meath">Meath</option>
                            <option value="monaghan">Monaghan</option>
                            <option value="offaly">Offaly</option>
                            <option value="roscommon">Roscommon</option>
                            <option value="sligo">Sligo</option>
                            <option value="tipperary">Tipperary</option>
                            <option value="tyrone">Tyrone</option>
                            <option value="waterford">Waterford</option>
                            <option value="westmeath">Westmeath</option>
                            <option value="wexford">Wexford</option>
                            <option value="wicklow">Wicklow</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>


                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="name" class="cols-sm-2 control-label">Password</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                          <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                  </div>
              
                   <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="name" class="cols-sm-2 control-label">Confirm Password</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true" ></i></span>
                          <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password" required/>
                        </div>
                    </div>
                  </div>
                  
                </div>

                <div class ="row">
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                      <label class="form-check-label" for="exampleCheck1"> I certify that I am over 18 years of age</label>
                    </div>
                  </div>
                </div>

                <div class ="row">
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group ">
                      <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="btn btn-primary btn-lg btn-block login-button" value="Register Now">
                    </div>
                  </div>
                </div>
              </form>
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
