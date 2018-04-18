<?php 
  session_start();
  include 'sql/db.php';
  include 'sql/newuser.php';
  include 'sql/purchaseSC1.php';
  include 'sql/purchaseSC2.php';
  include 'sql/purchaseSC3.php';
  include 'sql/purchaseSC4.php';
  include 'sql/purchaseSC5.php';
  include 'sql/purchaseSC6.php';
  $_SESSION['sc1t'] = "";
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
   <style>
      
        .scratchie {
            border: 3px solid #BFBBBB;
            width: 100%;
            height: 150px;
        }
    </style>
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
  <!-- /navbar -->
<div class="container"> 

  <div class="row">
    <div class="col-md-8 col-xs-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <span class="glyphicon glyphicon-user"></span> Welcome Back - <?php echo $_SESSION["currentUser"] ?>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-8 col-xs-6">
              <p><label>Current Balance: €<?php echo $_SESSION["balance"] ?>  </label></p>
            </div>
          </div>
          </div>
        </div>
      </div>

         <div class="col-md-4 col-xs-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Free Scratch Cards
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <table>
                  <tr>
                    <th>Type</th>
                    <th>Amount</th>
                  </tr>
                  <tr>
                    <td>Easy Scratch</td>
                    <td><?php echo $_SESSION["fg1"] ?></td>
                  </tr>
                  <tr>
                    <td>A Bit Of Luck</td>
                    <td><?php echo $_SESSION["fg2"] ?></td>
                  </tr>
                  <tr>
                    <td>Test The Bank</td>
                    <td><?php echo $_SESSION["fg3"] ?></td>
                  </tr>
                  <tr>
                    <td>A Bigger Chance</td>
                    <td><?php echo $_SESSION["fg4"] ?></td>
                  </tr>
                  <tr>
                    <td>All Scratched Out</td>
                    <td><?php echo $_SESSION["fg5"] ?></td>
                  </tr>
                  <tr>
                    <td>Big Winner</td>
                    <td><?php echo $_SESSION["fg6"] ?></td>
                  </tr>


                </table>
      
            </div>
          </div>
          
          </div>
        </div>
      </div>
    </div>



  <div class="row">

    <!-- Easy Scratch -->
    <div class="col-sm-4">
     <div class="panel panel-primary">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            EASY SCRATCH
            <span class="glyphicon glyphicon-star"></span>
          </strong>
          <br>
          <?php  if(isset($_SESSION['scMss']))
                      {
                        echo $_SESSION['scMss'];
                      };   ?>
        </div>
    
          <div class="scratchie" data-scratchie="#BFBBBB">
            <div class="panel-body">        
              <div class = "text-center">
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p1"] ?></p></div>
                  <div class="col-md-6 col-xs-6""><p><?php echo $_SESSION["p2"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p3"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p4"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p5"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p6"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p7"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p8"] ?></p></div>
                </div>
              </div>
            </div>
          </div>
        <div class="panel-footer">
          <div class = "row " >

             <div class="col-md-4 col-xs-4 ">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="insert" value="Play" onclick="insert()"/>
                  <span class="glyphicon glyphicon-play"></span> Play
                </button>
              </form>
            </div>


             <div class="col-md-4 col-xs-4 ">
              <form action="giftcard.php" method ="post">
                <button type="submit" class="btn btn-info" name="sg1" id="sg1" value="Play1"/>
                  <span class="glyphicon glyphicon-gift"></span> Send as gift
                </button>
              </form>
              </div>
            

              
            <div class="col-md-4 col-xs-4">
               <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €100</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €1</a></li>
            </ul>
            </div>


          </div>
          <br>
          <div class = "row " >
             <div class="col-md-12 col-xs-4">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="usefreego1" value="Play" onclick="usefreego1()"/>
                  <span class="glyphicon glyphicon-thumbs-up"></span> Use Free Go
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- /Easy Scratch -->

    <!-- A BIT OF LUCK --> 

    <div class="col-sm-4">
     <div class="panel panel-primary">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            A BIT OF LUCK
            <span class="glyphicon glyphicon-star"></span>
          </strong>
          <br>
          <?php  if(isset($_SESSION['scMss2']))
                      {
                        echo $_SESSION['scMss2'];
                      };   ?>
        </div>
    
          <div class="scratchie" data-scratchie="#BFBBBB">
            <div class="panel-body">        
              <div class = "text-center">
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p9"] ?></p></div>
                  <div class="col-md-6 col-xs-6""><p><?php echo $_SESSION["p10"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p11"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p12"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p13"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p14"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p15"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p16"] ?></p></div>
                </div>
              </div>
            </div>
          </div>
        <div class="panel-footer">
          <div class = "row " >

             <div class="col-md-4 col-xs-4 ">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="sc2" value="Play" onclick="sc2()"/>
                  <span class="glyphicon glyphicon-play"></span> Play
                </button>
              </form>
             </div>
             <div class="col-md-4 col-xs-4 ">
              <form action="giftcard.php" method ="post">
                <button type="submit" class="btn btn-info" name="sg2" id="sg2" value="Play2"/>
                  <span class="glyphicon glyphicon-gift"></span> Send as gift
                </button>
              </form>
            </div>

              
            <div class="col-md-4 col-xs-4">
               <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €200</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €2</a></li>
            </ul>
            </div>
          </div>

          <br>
          <div class = "row " >
             <div class="col-md-12 col-xs-4">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="usefreego2" value="Play" onclick="usefreego2()"/>
                  <span class="glyphicon glyphicon-thumbs-up"></span> Use Free Go
                </button>
              </form>
            </div>
          </div>
        </div>


      </div>
    </div>

<!-- /A BIT OF LUCK --> 

<!-- TEST THE BANK --> 
 <div class="col-sm-4">
     <div class="panel panel-primary">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            TEST THE BANK
            <span class="glyphicon glyphicon-star"></span>
          </strong>
          <br>
          <?php  if(isset($_SESSION['scMss3']))
                      {
                        echo $_SESSION['scMss3'];
                      };   ?>
        </div>
    
          <div class="scratchie" data-scratchie="#BFBBBB">
            <div class="panel-body">        
              <div class = "text-center">
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p17"] ?></p></div>
                  <div class="col-md-6 col-xs-6""><p><?php echo $_SESSION["p18"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p19"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p20"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p21"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p22"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p23"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p24"] ?></p></div>
                </div>
              </div>
            </div>
          </div>
        <div class="panel-footer">
          <div class = "row " >

             <div class="col-md-4 col-xs-4 ">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="sc3" value="Play" onclick="sc3()"/>
                  <span class="glyphicon glyphicon-play"></span> Play
                </button>
              </form>
             </div>
             <div class="col-md-4 col-xs-4 ">
              <form action="giftcard.php" method ="post">
                <button type="submit" class="btn btn-info" name="sg3" id="sg3" value="Play"/>
                  <span class="glyphicon glyphicon-gift"></span> Send as gift
                </button>
              </form>
            </div>

              
            <div class="col-md-4 col-xs-4">
               <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €500</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €3</a></li>
            </ul>
            </div>


          </div>
          <br>
          <div class = "row " >
             <div class="col-md-12 col-xs-4">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="usefreego3" value="Play" onclick="usefreego3()"/>
                  <span class="glyphicon glyphicon-thumbs-up"></span> Use Free Go
                </button>
              </form>
            </div>
          </div>
        </div>


      </div>
    </div>

<div class="row">
     <div class="col-md-12">
        <!-- SPACE BETWEEEN THE BOXES --> 
     </div>
</div>
<!-- /TEST THE BANK --> 
<div class="container">  
  
  <div class="row">


    <div class="col-sm-4">
     <div class="panel panel-primary">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            A BIGGER CHANCE
            <span class="glyphicon glyphicon-star"></span>
          </strong>
          <br>
          <?php  if(isset($_SESSION['scMss4']))
                      {
                        echo $_SESSION['scMss4'];
                      };   ?>
        </div>
    
          <div class="scratchie" data-scratchie="#BFBBBB">
            <div class="panel-body">        
              <div class = "text-center">
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p25"] ?></p></div>
                  <div class="col-md-6 col-xs-6""><p><?php echo $_SESSION["p26"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p27"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p28"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p29"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p30"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p31"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p32"] ?></p></div>
                </div>
              </div>
            </div>
          </div>
        <div class="panel-footer">
          <div class = "row " >

             <div class="col-md-4 col-xs-4 ">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="sc4" value="Play" onclick="sc4()"/>
                  <span class="glyphicon glyphicon-play"></span> Play
                </button>
              </form>
             </div>
             <div class="col-md-4 col-xs-4 ">
              <form action="giftcard.php" method ="post">
                <button type="submit" class="btn btn-info" name="sg4" id="sg4" value="Play"/>
                  <span class="glyphicon glyphicon-gift"></span> Send as gift
                </button>
              </form>
            </div>

              
            <div class="col-md-4 col-xs-4">
               <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €1000</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €5</a></li>
            </ul>
            </div>


          </div>
          <br>
          <div class = "row " >
             <div class="col-md-12 col-xs-4">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="usefreego4" value="Play" onclick="usefreego4()"/>
                  <span class="glyphicon glyphicon-thumbs-up"></span> Use Free Go
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="col-sm-4">
     <div class="panel panel-primary">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            ALL SCRATCHED OUT
            <span class="glyphicon glyphicon-star"></span>
          </strong>
          <br>
          <?php  if(isset($_SESSION['scMss5']))
                      {
                        echo $_SESSION['scMss5'];
                      };   ?>
        </div>
    
          <div class="scratchie" data-scratchie="#BFBBBB">
            <div class="panel-body">        
              <div class = "text-center">
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p33"] ?></p></div>
                  <div class="col-md-6 col-xs-6""><p><?php echo $_SESSION["p34"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p35"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p36"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p37"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p38"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p39"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p40"] ?></p></div>
                </div>
              </div>
            </div>
          </div>
        <div class="panel-footer">
          <div class = "row " >

             <div class="col-md-4 col-xs-4 ">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="sc5" value="Play" onclick="sc5()"/>
                  <span class="glyphicon glyphicon-play"></span> Play
                </button>
              </form>
             </div>
             <div class="col-md-4 col-xs-4 ">
              <form action="giftcard.php" method ="post">
                <button type="submit" class="btn btn-info" name="sg5" id="sg5" value="Play"/>
                  <span class="glyphicon glyphicon-gift"></span> Send as gift
                </button>
              </form>
            </div>

              
            <div class="col-md-4 col-xs-4">
               <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €5000</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €7</a></li>
            </ul>
            </div>

          </div>

          <br>
          <div class = "row " >
             <div class="col-md-12 col-xs-4">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="usefreego5" value="Play" onclick="usefreego5()"/>
                  <span class="glyphicon glyphicon-thumbs-up"></span> Use Free Go
                </button>
              </form>
            </div>
          </div>
        </div>


      </div>
    </div>
   
  <div class="col-sm-4">
     <div class="panel panel-primary">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-star"></span>
            BIG WINNER
            <span class="glyphicon glyphicon-star"></span>
          </strong>
          <br>
          <?php  if(isset($_SESSION['scMss6']))
                      {
                        echo $_SESSION['scMss6'];
                      };   ?>
        </div>
    
          <div class="scratchie" data-scratchie="#BFBBBB">
            <div class="panel-body">        
              <div class = "text-center">
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p41"] ?></p></div>
                  <div class="col-md-6 col-xs-6""><p><?php echo $_SESSION["p42"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p43"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p44"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p44"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p45"] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p46"] ?></p></div>
                  <div class="col-md-6 col-xs-6"><p><?php echo $_SESSION["p47"] ?></p></div>
                </div>
              </div>
            </div>
          </div>
        <div class="panel-footer">
          <div class = "row " >

             <div class="col-md-4 col-xs-4 ">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="sc6" value="Play" onclick="sc6()"/>
                  <span class="glyphicon glyphicon-play"></span> Play
                </button>
              </form>
             </div>
             <div class="col-md-4 col-xs-4 ">
              <form action="giftcard.php" method ="post">
                <button type="submit" class="btn btn-info" name="sg6" id="sg6" value="Play"/>
                  <span class="glyphicon glyphicon-gift"></span> Send as gift
                </button>
              </form>
            </div>

              
            <div class="col-md-4 col-xs-4">
               <button class="btn btn-primary dropdown-toggle btn btn-info" type="button" data-toggle="dropdown" >
              <span class="glyphicon glyphicon-info-sign"></span> Info
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Top Prize - €10,000</a></li>
              <li class="divider"></li>
              <li><a href="#">Scratch Card Price - €10</a></li>
            </ul>
            </div>


          </div>

          <br>
          <div class = "row " >
             <div class="col-md-12 col-xs-4">
              <form action="profile.php">
                <button type="submit" class="btn btn-info" name="usefreego6" value="Play" onclick="usefreego6()"/>
                  <span class="glyphicon glyphicon-thumbs-up"></span> Use Free Go
                </button>
              </form>
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