<?php 
  session_start();
  include 'sql/db.php';

  $id = $_SESSION["id"]; 

  $sql = "SELECT * FROM users WHERE `id`= '$id'";


  //--- ACCESSING USER DATA FOR INPUT BOXES BELOW - // 
      $result = $conn->query($sql);
      if ($result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
        {
           $fname = $row['fname'];
           $lname = $row['lname'];
           $email = $row['email'];
           $dob = $row['dob'];
           $pass = $row['pass'];
           $county = $row['county'];
        }
      }
      else
      {
        echo "error 1";
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.payform.min.js" charset="utf-8"></script>
  <script src="js/script.js"></script>
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
<div class="container" > 

  <div class="row">


    <div class="col-md-6 col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Account Details
        </div>
        <div class="panel-body">
          <table id="example" class="display" style="width:100%">
            <tr>
              <td>Personal ID: </td>
              <td><input type="text" id="id" placeholder="<?php echo $id  ?>" value="<?php echo $id  ?>"" disabled></td>
            </tr>
            <tr>
              <td>First Name: </td>
              <td><input type="text" id="fname"  name="fname" placeholder="<?php echo $fname  ?>" value="<?php echo $fname  ?>" disabled></td>
            </tr>
            <tr>   
              <td>Last Name: </td>
              <td><input type="text" id="lname" name="lname" placeholder="<?php echo $lname  ?>" value="<?php echo $lname  ?>" disabled></td>
            </tr>
            <tr>
              <td>Email Address: </td>
              <td><input type="text" id="email" name="email" placeholder="<?php echo $email  ?>" value="<?php echo $email  ?>" disabled></td>
            </tr>
            <tr>
              <td>Date Of Birth: </td>
              <td><input type="text" id="dob" name="dob" placeholder="<?php echo $dob  ?>" value="<?php echo $dob  ?>" disabled></td>
            </tr>
            <tr>
              <td>Password: </td>
              <td><input type="text" id="password" name="password" placeholder="<?php echo $pass  ?>" value="<?php echo $pass  ?>" disabled></td>
            </tr>
            <tr>
                <td>County: </td>
                <td><input type="text" id="county" name="county" placeholder="<?php echo $county  ?>" value="<?php echo $county  ?>" disabled></td>
            </tr>

        </table>
           
          
        </div>
        <div class="panel-footer">
          <button type="submit" class="btn btn-info" onclick="Me();">Change</button>
          <button type="submit" class="btn btn-info" >Update</button>
        </div>
      </div>
    </div>

    <!--script for above buttons -->
    <script type="text/javascript">
      
      function Me()
      {
        
        if(document.getElementById("fname").disabled == true)
        {
          document.getElementById("fname").disabled = false;
          document.getElementById("lname").disabled = false;
          document.getElementById("email").disabled = false;
          document.getElementById("dob").disabled = false;
          document.getElementById("password").disabled = false;
          document.getElementById("county").disabled = false;
        }
        else
        {
          document.getElementById("fname").disabled = true;
          document.getElementById("lname").disabled = true;
          document.getElementById("email").disabled = true;
          document.getElementById("dob").disabled = true;
          document.getElementById("password").disabled = true;
          document.getElementById("county").disabled = true;
        }
        
      }

    </script>

    <!--/script for above buttons -->

    <div class="col-md-6 col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Cards
        </div>
        <div class="panel-body">
            <div class="container-fluid">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>Card Number</th>
                      <th>Expiry Date</th>
                      <th>Date Added</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                    <?php 
                         
                          $id = $_SESSION["id"];
                          $sql = "SELECT * FROM usercards WHERE id =  '$id ' ";
                          $result = $conn->query($sql);


                          while($row = mysqli_fetch_array($result))
                          {
                          echo "<tr>";
                          echo "<td>" . $row['cardno'] . "</td>";
                          echo "<td>" . $row['expirydate'] . "</td>";
                          echo "<td>" . $row['cardadded'] . "</td>";
                          echo "<td>" . "<input type='checkbox'>" . "</td>";
                          echo "</tr>";
                          } 
                      ?>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="panel-footer">
          <div class="form-group" id="pay-now">
              <button type="submit" class="btn btn-info" id="confirm-purchase">Delete Selected Card(s)</button>
          </div>
        </div>
      </div>
    </div>

</div>

<div class="row">
<div class="col-md-4 col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Collect Balance
        </div>
        <div class="panel-body">

          <p><label>Current Balance: €<?php echo $_SESSION["balance"] ?>  </label></p>
          
        </div>
        <div class="panel-footer">
          
        </div>
      </div>
    </div>
    <div class="col-md-2 col-xs-12">
    </div>


    <div class="col-md-6 col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Add A Card
        </div>
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
                            <option value="16"> 2019</option>
                            <option value="17"> 2020</option>
                            <option value="18"> 2021</option>
                            <option value="19"> 2022</option>
                            <option value="20"> 2023</option>
                            <option value="21"> 2024</option>
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
      </div>
      <div class="panel-footer">
        <div class="form-group" id="pay-now">
              <button type="submit" class="btn btn-info" id="confirm-purchase">Add Card</button>
          </div>
          
      </div>



    </div>
  </div>
</form>



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