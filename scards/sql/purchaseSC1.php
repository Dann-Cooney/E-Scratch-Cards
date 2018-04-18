<?php  

include 'sql/db.php';
$fname = $_SESSION["currentUser"];
$id = $_SESSION["id"];
$_SESSION["p1"] = 0;
$_SESSION["p2"] = 0;
$_SESSION["p3"] = 0;
$_SESSION["p4"] = 0;
$_SESSION["p5"] = 0;
$_SESSION["p6"] = 0;
$_SESSION["p7"] = 0;
$_SESSION["p8"] = 0;






$sql = "SELECT `freego` FROM `scratchcards` Where `id` = '$id' AND `type` = '1' ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc()) 
                  {
                    $dbfreego = $row['freego'];
                    $_SESSION["fg1"] = $dbfreego;
                  }

          }
          else
          {
            echo "not workdsding";
          }

      

$sql = "SELECT * FROM users WHERE fname ='admin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
        {
          $adminID = $row['id'];

        }
  $_SESSION["adminID"] = $adminID ;

    }
         

if($_GET)
{
    if(isset($_GET['insert']))
    {
        purchasecard1();
    }
    if(isset($_GET['usefreego1']))
    {
        usefreego1();
    }
}

//-----------------------FREE GO----------------------//
function usefreego1() 
{
  include 'sql/db.php';
  $id = $_SESSION["id"];

  $sql = "SELECT * FROM scratchcards Where id = '$id' AND type = '1'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc())
    {
      $dbfreego1 = $row['freego'];
    } 
  }

  if($dbfreego1 > 0 )
  {
    $dbfreego1 = $dbfreego1 - 1;
    $sql = "UPDATE `scratchcards` SET `freego`= '$dbfreego1' WHERE `id` = '$id' AND type = '1'";
    if ($conn->query($sql) === TRUE) 
    {
      $_SESSION["fg1"] = $dbfreego1;
       calculate(); 
    }
    else
    {
      echo "didn't work";
    }

  }
  // 0 Scratch cards left
  else
  {
     $_SESSION["scMss"] = "Sorry, You don't have any free scratch cards left";
  }
}

//-----------------------/FREE GO----------------------//

function updateAdminAccount()
{
include 'sql/db.php';
   $admin =$_SESSION["adminID"];
  $sql = "SELECT balance FROM userfunds Where id = '$admin' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
     while($row = $result->fetch_assoc()) 
      {
        $dbbalance = $row['balance'];
        $newbalance = $dbbalance +1;
      }

      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$admin'";
      if ($conn->query($sql) === TRUE) 
      {
                   
      } 
      else
      {
        echo "didn't work";
      }

  }
  else
  {
    echo "no admin balance found";
  }
}

function deductAdminAccount()
{
  include 'sql/db.php';
  $admin =$_SESSION["adminID"];
  $sql = "SELECT balance FROM userfunds Where id = '$admin' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
     while($row = $result->fetch_assoc()) 
      {
        $dbbalance = $row['balance'];
        $newbalance = $dbbalance - $_SESSION["deductAmount"] ;
      }

      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$admin'";
      if ($conn->query($sql) === TRUE) 
      {
                   
      } 
      else
      {
        echo "didn't work";
      }

  }
  else
  {
    echo "no admin balance found";
  }
}
function purchasecard1() 
{
  include 'sql/db.php';
  $id = $_SESSION["id"];
   $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                   //if user's balance is gone below 0, they must update thier balance
                  if ($_SESSION["balance"] <= 0)
                  {
                      header("Location:updateBalance.php");
                      exit();
                  }
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance - 1;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 

      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
        updateAdminAccount();
        calculate();      
      } 

}




function calculate() 
{
  include 'sql/db.php';
  $id = $_SESSION["id"];

  // 11/99 chance of winning a free go.
  // 10/99 chance of winning a €2..
  // 9/99 chance of winning a €4.
  // 8/99 chance of winning a €5.
  // 7/99 chance of winning a €10.
  // 6/99 chance of winning a €15.
  // 5/99 chance of winning a €20.
  // 4/99 chance of winning a €25.
  // 3/99 chance of winning a €50.
  // 2/99 chance of winning a €75.
  // 1/99 chance of winning a €100.


  $val1 = array("X","X","X","FREE"); 
  $val2 = array("X","X","X","FREE","€2"); 
  $val3 = array("X","X","X","FREE","€2","€4");
  $val4 = array("X","X","X","FREE","€2","€4","€5"); 
  $val5 = array("X","X","X","FREE","€2","€4","€5","€10");
  $val6 = array("X","X","X","FREE","€2","€4","€5","€10","€15");
  $val7 = array("X","X","X","FREE","€2","€4","€5","€10","€15","€20");
  $val8 = array("X","X","X","FREE","€2","€4","€5","€10","€15","€20","€25");
  $val9 = array("X","X","X","FREE","€2","€4","€5","€10","€15","€20","€25","€50");
  $val9 = array("X","X","X","FREE","€2","€4","€5","€10","€15","€20","€25","€50","€75");
  $val10 = array("X","X","X","FREE","€2","€4","€5","€10","€15","€20","€25","€50","€75","€100");






  $total= array_merge($val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9);


  $randomAmount = [];
  $i = 0;
  $feCount = 0;
  $twoeCount = 0;
  $foureCount = 0;
  $fiveeCount = 0;
  $teneCount = 0;
  $fifeCount = 0;
  $tweeCount = 0;
  $twefeCount = 0;
  $fifteCount = 0;
  $sevfifeCount = 0;
  $huneCount = 0;


  while ($i < 8) 
  {
    shuffle($total);
      $value = $total[rand(0, count($total) - 1)];
      $randomAmount[$i] = $value;
  
      if ($randomAmount[$i] == "FREE")
        {
           $feCount++;
        }
       if ($randomAmount[$i] == "€2")
        {
           $twoeCount++;
        }
       
        if ($randomAmount[$i] == "€4")
        {
           $foureCount++;
        }
        if ($randomAmount[$i] == "€5")
        {
           $fiveeCount++;
        }
        if ($randomAmount[$i] == "€10")
        {
           $teneCount++;
        }
        if ($randomAmount[$i] == "€15")
        {
           $fifeCount++;
        }
        if ($randomAmount[$i] == "€20")
        {
           $tweeCount++;
        }
        if ($randomAmount[$i] == "€25")
        {
           $twefeCount++;
        }
        if ($randomAmount[$i] == "€50")
        {
           $fifteCount++;
        }
        if ($randomAmount[$i] == "€75")
        {
           $sevfifeCount++;
        }
        if ($randomAmount[$i] == "€100")
        {
           $huneCount++;
        }


      $i++;
    
    }
    
    $_SESSION["p1"] =  $randomAmount[0]; 
    $_SESSION["p2"] =  $randomAmount[1]; 
    $_SESSION["p3"] =  $randomAmount[2]; 
    $_SESSION["p4"] =  $randomAmount[3]; 
    $_SESSION["p5"] =  $randomAmount[4]; 
    $_SESSION["p6"] =  $randomAmount[5]; 
    $_SESSION["p7"] =  $randomAmount[6]; 
    $_SESSION["p8"] =  $randomAmount[7]; 
    if($feCount >= 3)
    {

      $sql = "SELECT * FROM scratchcards Where id = '$id' AND `type` = '1' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    date_default_timezone_set('Europe/Dublin');
                    $currentTime = date('Y-m-d H:i:s');
                    $dbtype = $row['type'];
                    $dbdate = $row['date'];
                    $dbfreego = $row['freego'];
                    $newfeegoAmount = $dbfreego + 1;
                   
                  }
                } 
       $sql = "UPDATE `scratchcards` SET `freego`= '$newfeegoAmount', `date`='$currentTime' WHERE `id` = '$id' AND `type` = '1'";
      if ($conn->query($sql) === TRUE) 
      {

          $_SESSION["scMss"] = "Congratulations you Won a Free Scratch Card";
          $sql = "SELECT `freego` FROM `scratchcards` Where `id` = '$id' AND `type` = '1' ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc()) 
                  {
                    $dbfreego = $row['freego'];
                    $_SESSION["fg1"] = $dbfreego;
                  }

          }
          else
          {
            $sql = "INSERT INTO `scratchcards` (type,freego,date,id) VALUES ('1','1','$currentTime','$id')";
            if ($conn->query($sql) === TRUE) 
            {

            $sql = "SELECT `freego` FROM `scratchcards` Where `id` = '$id' AND `type` = '1' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc()) 
                    {
                      $dbfreego = $row['freego'];
                      $_SESSION["fg1"] = $dbfreego;
                    }
                  }
            
            }
            else
            {
              echo " didnt worked";
            }
          }


      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else if($twoeCount >= 3)
    {
      $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance + 2;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 
      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
          $_SESSION["scMss"] = "Congratulations you Won €2"; 
          $_SESSION["deductAmount"] = 2;
          deductAdminAccount();              
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else if($foureCount >= 3)
    {
      $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance + 4;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 
      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
         $_SESSION["scMss"] = "Congratulations you Won €4"; 
         $_SESSION["deductAmount"] = 4;
         deductAdminAccount();             
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else if($fiveeCount >= 3)
    {
      $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance + 5;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 
      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
          $_SESSION["scMss"] = "Congratulations you Won €5";               
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else if($teneCount >= 3)
    {
      $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance + 10;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 
      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
          $_SESSION["scMss"] = "Congratulations you Won €10";              
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else if($fifeCount >= 3)
    {
      $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance + 15;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 
      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
          $_SESSION["scMss"] = "Congratulations you Won €15";              
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else if($tweeCount >= 3)
    {
      $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance + 20;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 
      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
         $_SESSION["scMss"] = "Congratulations you Won €20";              
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else if($twefeCount >= 3)
    {
      $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance + 25;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 
      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
          $_SESSION["scMss"] = "Congratulations you Won €25";               
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else if($fifteCount >= 3)
    {
      $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance + 50;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 
      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
          $_SESSION["scMss"] = "Congratulations you Won €50";              
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else if($sevfifeCount >= 3)
    {
      $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance + 75;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 
      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
          $_SESSION["scMss"] = "Congratulations you Won €75";              
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else if($huneCount >= 3)
    {
      $sql = "SELECT balance FROM userfunds Where id = '$id' ";
      $result = $conn->query($sql);
         if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    $dbbalance = $row['balance'];
                    $newbalance = $dbbalance + 100;
                    $_SESSION["balance"] =  $newbalance;
                  }
                } 
      $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
      if ($conn->query($sql) === TRUE) 
      {
          $_SESSION["scMss"] = "Congratulations you Won €100";              
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else
    {
      $_SESSION["scMss"] = "No Win, Try Again";
    }
    
}

?>