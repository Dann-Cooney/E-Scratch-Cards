<?php  
session_start();
include 'sql/db.php';
include 'sql/purchaseSC1.php'

?>


<!DOCTYPE html>
<html>
<head>
  <title>E-Scratch Cards</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
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


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
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
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> About</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Fair Play</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
        <li><a href="register.php"><span class="glyphicon glyphicon-shopping-cart"></span> Register</a></li>
      </ul>
    </nav>
    </div>
  </div>
</nav>



<div class="container">
   

    <div class="col-md-4">
       <?php echo  "Fname:". $fname ?><br>
       <?php echo  "id:". $_SESSION["id"] ?><br>
       <?php echo  "balance:". $_SESSION["balance"] ?><br>
       <?php echo  "free go:" . $_SESSION["freego"] ?><br>

    </div>
    <div class="col-md-4">
      <div class="panel panel-primary">
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
              <form action="purchase.php">
                <input type="submit" name="insert" value="Purchase" onclick="insert()" />
              </form>
        </div>
      </div>
    </div>

    <div class="col-md-4">
       <div class="scratchie scratchie--disabled" data-scratchie="white">
  <div class="scratchie__secret" style="visibility: hidden;">🤗</div>
</div>
<br />
<button>Enable</button>
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


const button = document.querySelector('button');
const elements = new Scratchie('[data-scratchie]', {
  onRenderEnd: function() {
    // Show the secret when Image is loaded.
    this.element.querySelector('.scratchie__secret').style.visibility = 'visible';
    
    // Reset className
    this.element.classList.remove('scratchie--scratched');
  },
  onScratch: function(scratchedPixels) {
    if (scratchedPixels < 99) return;
    this.element.classList.add('scratchie--scratched');
  }
});

button.addEventListener('click', e => {
  e.target.textContent = elements[0].classList.toggle('scratchie--disabled') ? 'Enable' : 'Disable';
})

</script>

