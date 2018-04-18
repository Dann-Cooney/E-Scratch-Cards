<?php 
  session_start();
  include 'sql/db.php';


if(isset($_POST['sg1']))
{
    $_SESSION['sg1'] = $_POST['sg1'];
    unset($_SESSION['sg2']);
    unset($_SESSION['sg3']);
    unset($_SESSION['sg4']);
    unset($_SESSION['sg5']);
    unset($_SESSION['sg6']);
}
if(isset($_POST['sg2']))
{
    $_SESSION['sg2'] = $_POST['sg2'];
    unset($_SESSION['sg1']);
    unset($_SESSION['sg3']);
    unset($_SESSION['sg4']);
    unset($_SESSION['sg5']);
    unset($_SESSION['sg6']);
}
if(isset($_POST['sg3']))
{
    $_SESSION['sg3'] = $_POST['sg3'];
    unset($_SESSION['sg1']);
    unset($_SESSION['sg2']);
    unset($_SESSION['sg4']);
    unset($_SESSION['sg5']);
    unset($_SESSION['sg6']);
}
if(isset($_POST['sg4']))
{
    $_SESSION['sg4'] = $_POST['sg4'];
    unset($_SESSION['sg1']);
    unset($_SESSION['sg3']);
    unset($_SESSION['sg2']);
    unset($_SESSION['sg5']);
    unset($_SESSION['sg6']);
}
if(isset($_POST['sg5']))
{
    $_SESSION['sg5'] = $_POST['sg5'];
    unset($_SESSION['sg1']);
    unset($_SESSION['sg3']);
    unset($_SESSION['sg4']);
    unset($_SESSION['sg2']);
    unset($_SESSION['sg6']);
}
if(isset($_POST['sg6']))
{
    $_SESSION['sg6'] = $_POST['sg6'];
    unset($_SESSION['sg1']);
    unset($_SESSION['sg3']);
    unset($_SESSION['sg2']);
    unset($_SESSION['sg5']);
    unset($_SESSION['sg4']);
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
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
      <ul class="nav navbar-nav navbar-right">
        <li><a href="reedeem.php"><span class="glyphicon glyphicon-download"></span> Redeem Code</a></li>
        <li><a href="updateBalance.php"><span class="glyphicon glyphicon-gift"></span> Update Balance</a></li>
        <li><a href="accdetails.php"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
        <li><a href="sql/logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
      </ul>
      </ul>
    </nav>
    </div>
      </div>
  </div>
<div class="container" > 

  <div class="row">
    <div class="col-md-8 col-xs-12 col-centered">
        <div class="panel panel-primary">
          <div class="panel-body">

            <div class="row">
              <div class="col-md-12 col-xs-12 text-center">
                <div class="form-group">
                  <p><header><b>Gift Scratch Cards</b></header></p>
                  <p><content>Gift Scratch Cards are a way of sending a friend or family member a scratch card online that<br> they can use whenever they decide. If you click purchase a total of (PHP CODE)
                    will be deducted from your account. You will be presented with a 12 digit code, that can be reedemeed at any time.<br>
                    <i>This is the code you send to your friend so they can use a scratch card. </i></content></p>
                </div>
              </div>
            </div>


            <div class ="row">
              <div class="col-md-6 col-xs-12 col-centered">
               <?php echo "<h3>" .$_SESSION['sc1t']. "</h3>"?>
              </div>
            </div>

            <div class ="row">
              <div class="col-md-6 col-xs-6 col-centered">
                <form action="sql/token.php" method ="post">
                  <input type="submit" name="sg1" id="sg1" tabindex="4" class="btn btn-primary  btn-block login-button" value="Purchase"> </form>

              </div>
            </div>
             <input type="button" value="Print this page" onClick="window.print()" >
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
<script src="js/scratchie.js"></script>
<script>

(function() 
{

    var scratchie = new Scratchie('[data-scratchie]', {brush: 'img/brush.png',
        onRenderEnd: function() 
        {
            // Show the form when Image is loaded.
            this.element.querySelectorAll('.scratchie__secret')[0].style.visibility = 'visible';
        },
        onScratchMove: function(filledInPixels) {
            //console.log(filledInPixels + '%');
        }
    });

    // Global expose
    window.scratchie = scratchie;
})();


</script>