<?php 
  include 'sql/db.php';
  include 'sql/resetSession.php';
 $id = $_SESSION["id"];
  $query = "SELECT * FROM `usercards` WHERE id =  '$id '  ";
  $result1 = mysqli_query($conn, $query);
  $result2 = mysqli_query($conn, $query);

 ?>

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
<section class="content">
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
        <li><a href="profile.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="reedeem.php"><span class="glyphicon glyphicon-download"></span> Redeem Code</a></li>
        <li><a href="updateBalance.php"><span class="glyphicon glyphicon-gift"></span> Update Balance</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
        <li><a href="sql/logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
      </ul>
      </ul>
    </nav>
    </div>
      </div>
  </div>
  <!-- /navbar -->

<div class="container">  
  
    <div class="row">
      <div class="col-md-12 col-xs-`12">
        <div class="panel panel-primary">
          <div class="panel-heading">Update Balance</div>
            <div class="panel-body">

              <form action="sql/addBalance.php" method="post">
                <div class="form-group">
                  <label for="name" class="cols-sm-2 control-label">Please Enter Amount:</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-euro fa" aria-hidden="true"></i></span>
                          <input type="number" class="form-control" name="amount" id="amount"/>
                      </div>
                    </div>
                  </div>
                <div class="form-group ">
                  <label for="name" class="cols-sm-2 control-label">Select Card:</label>
                     <select id="soflow">
                      <?php while($row1 = mysqli_fetch_array($result1)):;?>
                        <option value="<?php echo $row1[0];?>"><?php echo $row1[3];?></option>
                      <?php endwhile;?>
                    </select>
                </div>
                <div class="form-group ">
                  <label for="name" class="cols-sm-2 control-label">Paypal:</label>
                </div>
                <div class="form-group ">
                   <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="btn btn-primary btn-lg btn-block login-button" value="Update Balance">
                </div>
              </form>
            </div>
          </div>
        </div> 
      </div>



      
    </div>
</div>

<footer>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-xs-6">
      1
    </div>
     <div class="col-md-6 col-xs-6">
      
    </div>

  </div>
</div> 
</footer>

</body>
</html>

