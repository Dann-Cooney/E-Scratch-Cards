<?php 
  include 'sql/db.php';
  include 'sql/resetSession.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>E-Scratch Cards</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  </head>
<body>
<div class="container" > 
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
        <li><a href="#"><span class="glyphicon glyphicon-download"></span> Redeem Code</a></li>
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

  <div class="row">
    <div class="col-md-8 col-xs-12 col-centered">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            Please enter your token
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12 col-xs-12 text-center">
                <div class="form-group">
                  <p><header><b>This is the token that you recieved from a friend or family member<br><br>
                  Example: YDAS-LPRX-TQCP-IZVF</b></header></p>
                  <p><content>. </i></content></p>
                </div>
              </div>
            </div>

            <form action="sql/reedeem.php" method="post"  >
                <div class="row">
                  <div class="col-md-12 col-xs-12 text-center">
                    <div class="form-group">
                      <strong>
                       <?php  if(isset($_SESSION['reMsg']))
                      {
                        echo $_SESSION['reMsg'];
                      };   ?>
                    </strong>
                    </div>
                  </div>
                 </div>
                <div class="row">

                  <div class="col-md-3 col-xs-3">
                    <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control"  maxlength="4"  style="text-align:center"  name="p1" id="p1" required/>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-3 col-xs-3">
                    <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control" maxlength="4"  style="text-align:center"  name="p2" id="p2"  required/>
                        </div>
                    </div>
                  </div>

                   <div class="col-md-3 col-xs-3">
                    <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control" maxlength="4"  style="text-align:center"  name="p3" id="p3" required/>
                        </div>
                    </div>
                  </div>

                   <div class="col-md-3 col-xs-3">
                    <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control"  maxlength="4"  style="text-align:center" name="p4" id="p4" required/>
                        </div>
                    </div>
                  </div>
                </div>


                <div class ="row">
                  <div class="col-md-6 col-xs-6 col-centered">
                    <div class="form-group ">
                      <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="btn btn-primary  btn-block login-button" value="Reedem Code">
                    </div>
                  </div>
                </div>
            </form>
          </div>
           <div class="panel-footer">
           
          
        </div>
        </div>
      </div>
    </div>
  </div>



</div>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

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