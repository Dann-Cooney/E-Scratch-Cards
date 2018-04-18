<!--

Student: Daniel Cooney
Student No: C00197455
Project: E-Scratch Cards
Supervisor: Lei Shi 
Due Date: 18 - 04 - 2018

Page - Index 
Purpose - First page accessed by the user. 


-->

<!DOCTYPE html>
<html lang="en">
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
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
              <li><a href="register.php"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

<!-- /navbar -->

<!--content -->
<div class="container">   
  <div class="row">

    <!--Scratch Card 1 -->
    <div class="col-md-4">
     <div class="panel panel-primary">

        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            EASY SCRATCH
            <span class="glyphicon glyphicon-star"></span>
          </strong>
        </div>

        <div class="panel-body">
          <img src="https://placehold.it/150x80?text=EASY SCRATCH" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="panel-footer">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €100</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €1</a></li>
            </ul>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-play"></span> Play Now</a>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-gift"></span> Send as gift</a>
          </div>
        </div>
      </div>
    </div>

    <!--/Scratch Card 1 -->


    <!--Scratch Card 2 -->
     <div class="col-md-4">
     <div class="panel panel-primary">

        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            A BIT OF LUCK
            <span class="glyphicon glyphicon-star"></span>
          </strong>
        </div>

        <div class="panel-body">
          <img src="https://placehold.it/150x80?text=A BIT OF LUCK" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="panel-footer">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €200</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €2</a></li>
            </ul>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-play"></span> Play Now</a>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-gift"></span> Send as gift</a>
          </div>
        </div>
      </div>
    </div>
    <!--/Scratch Card 2 -->

    <!--Scratch Card 3 -->
    <div class="col-md-4">
     <div class="panel panel-primary">

        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            TEST THE BANK
            <span class="glyphicon glyphicon-star"></span>
          </strong>
        </div>

        <div class="panel-body">
          <img src="https://placehold.it/150x80?text=TEST THE BANK" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="panel-footer">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €500</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €3</a></li>
            </ul>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-play"></span> Play Now</a>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-gift"></span> Send as gift</a>
          </div>
        </div>
      </div>
    </div>

<!--/Scratch Card 3 -->
<div class="container">    
  <div class="row">

  <!--Scratch Card 4 -->
    <div class="col-md-4">
     <div class="panel panel-primary">

        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            A BIGGER CHANCE
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="glyphicon glyphicon-star"></span>
          </strong>
        </div>

        <div class="panel-body">
          <img src="https://placehold.it/150x80?text=A BIGGER CHANCE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="panel-footer">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €1000</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €5</a></li>
            </ul>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-play"></span> Play Now</a>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-gift"></span> Send as gift</a>
          </div>
        </div>
      </div>
    </div>

    <!--/Scratch Card 4 -->

     <!--Scratch Card 5 -->
    <div class="col-md-4">
     <div class="panel panel-primary">

        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            ALL SCRATCHED OUT
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="glyphicon glyphicon-star"></span>
          </strong>
        </div>

        <div class="panel-body">
          <img src="https://placehold.it/150x80?text=ALL SCRATCHED OUT" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="panel-footer">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €5000</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €7</a></li>
            </ul>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-play"></span> Play Now</a>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-gift"></span> Send as gift</a>
          </div>
        </div>
      </div>
    </div>

    <!--/Scratch Card 5 -->
    <!--Scratch Card 6 -->

    <div class="col-sm-4"> 
      <div class="panel panel-primary">
         <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
          BIG WINNER
        <span class="glyphicon glyphicon-star-empty"></span>
      <span class="glyphicon glyphicon-star-empty"></span>
    </strong></div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=BIG WINNER" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
                <span class="glyphicon glyphicon-info-sign"></span> Info
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">Top Prize - €10,000</a></li>
                <li class="divider"></li>
                <li><a href="#">Scratch Card Price - €10</a></li>
              </ul>
              <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-play"></span> Play Now</a>
            <a href="login.php" class="btn btn-info"><span class="glyphicon glyphicon-gift"></span> Send as gift</a>

            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!--/content -->

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
