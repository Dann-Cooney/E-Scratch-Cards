<?php 
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Scratch Cards</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery.payform.min.js" charset="utf-8"></script>
  <script src="js/script.js"></script>

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
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
      </ul>
    </nav>
    </div>
  </div>
</nav>
<div class="container">    
  <div class="row">
   <div class="col-md-12 col-xs-`12">
      <div class="panel panel-primary">
        <div class="panel-heading">Payment Methods</div>
        <div class="panel-body">
        </div>
        <div class="panel-footer">
          <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-info-sign"></span>Add Payment</a>
          <a href="updateBalance.php" class="btn btn-info"><span class="glyphicon glyphicon-gift"></span> Update Balance</a>
          <a href="viewCards.php" class="btn btn-info"><span class="glyphicon glyphicon-gift"></span> View Cards</a>
          <a href="purchase.php" class="btn btn-info"><span class="glyphicon glyphicon-euro"></span> Redeem Code</a></span></a></span></a></div>
      </div>
    </div>
 </div> 
   <div class="row">
   <div class="col-md-12 col-xs-`12">
      <div class="panel panel-primary">
        <div class="panel-heading">Add A Card</div>
        <div class="panel-body">
           <div class="container-fluid">
  
        <div class="creditCardForm">
            <div class="payment">
                <form method="post" action="sql/addpayment.php">
                    <div class="form-group owner">
                        <label for="owner">Owner</label>
                        <input type="text" class="form-control" name="owner"  id="owner">
                    </div>
                    <div class="form-group CVV">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control"  name="cvv" id="cvv">
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" name="cardNumber" id="cardNumber">
                    </div>
                    <div class="form-group">
                        <label>Expiration Date</label>
                        <select name ="expirymonth" id="expirymonth" >
                            <option value="01">January</option>
                            <option value="02">February </option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name ="expiryyear" id="expiryyear">
                            <option value="16"> 2016</option>
                            <option value="17"> 2017</option>
                            <option value="18"> 2018</option>
                            <option value="19"> 2019</option>
                            <option value="20"> 2020</option>
                            <option value="21"> 2021</option>
                        </select>
                    </div>
                    <div class="form-group" id="credit_cards">
                        <img src="img/visa.jpg" id="visa">
                        <img src="img/mastercard.jpg" id="mastercard">
                        <img src="img/amex.jpg" id="amex">
                    </div>
                    
                
            </div>
        </div>
        </div>
        <div class="panel-footer">
          <div class="form-group" id="pay-now">
              <button type="submit" class="btn btn-info" id="confirm-purchase">Add Card</button>
          </div>
          </form>
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
