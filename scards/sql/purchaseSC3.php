<?php  
$fname = $_SESSION["currentUser"];
$id = $_SESSION["id"];
$_SESSION["p17"] = 0;
$_SESSION["p18"] = 0;
$_SESSION["p19"] = 0;
$_SESSION["p20"] = 0;
$_SESSION["p21"] = 0;
$_SESSION["p22"] = 0;
$_SESSION["p23"] = 0;
$_SESSION["p24"] = 0;

$sql = "SELECT `freego` FROM `scratchcards` Where `id` = '$id' AND `type` = '3' ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc()) 
                  {
                    $dbfreego = $row['freego'];
                    $_SESSION["fg3"] = $dbfreego;
                  }

          }
          else
          {
            echo "not working";
          }

      


if($_GET)
{
  if(isset($_GET['sc3']))
  {
      purchasecard3();
  }
  if(isset($_GET['usefreego3']))
  {
      usefreego3();
  } 
}

//-----------------------FREE GO----------------------//
function usefreego3() 
{
  include 'sql/db.php';
  $id = $_SESSION["id"];

  $sql = "SELECT * FROM scratchcards Where id = '$id' AND type = '3'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc())
    {
      $dbfreego3 = $row['freego'];
    } 
  }

  if($dbfreego3 > 0 )
  {
    $dbfreego3 = $dbfreego3 - 1;
    $sql = "UPDATE `scratchcards` SET `freego`= '$dbfreego3' WHERE `id` = '$id' AND type = '3'";
    if ($conn->query($sql) === TRUE) 
    {
      $_SESSION["fg3"] = $dbfreego3;
      calscratch3();
    }
    else
    {
      echo "didn't work";
    }

  }
  // 0 Scratch cards left
  else
  {
     $_SESSION["scMss3"] = "Sorry, You don't have any free scratch cards left";
  }
}

//-----------------------/FREE GO----------------------//

function purchasecard3() 
{
  include 'sql/db.php';
  $id = $_SESSION["id"];
 
  $sql = "SELECT balance FROM userfunds Where id = '$id' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    if ($_SESSION["balance"] <= 0)
    {
      header("Location:updateBalance.php");
      exit();
    }
    while($row = $result->fetch_assoc()) 
    {
      $dbbalance = $row['balance'];
      $newbalance = $dbbalance - 3;
      $_SESSION["balance"] =  $newbalance;
    }
  } 
  $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
  if ($conn->query($sql) === TRUE) 
  {
    calscratch3();
  } 
}


function calscratch3()
{
  include 'sql/db.php';
  $id = $_SESSION["id"];
 
  $sCAmount = array("FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE","FREE",
                    "FREE","FREE","FREE","FREE","FREE",
                    "€2","€2","€2","€2","€2","€2","€2","€2","€2","€2","€2","€2","€2","€2","€2","€2","€2",
                    "€4","€4","€4","€4","€4","€4","€4","€4","€4","€4","€4","€4","€4",
                    "€5","€5","€5", "€5","€5","€5", "€5","€5","€5", "€5","€5",
                    "€10","€10","€10","€10", "€10","€10","€10","€10",
                    "€15","€15","€15","€15","€15","€15","€15",
                    "€20","€20","€20","€20","€20","€20",
                    "€25","€25","€25","€25",
                    "€50","€50","€50",
                    "€75", "€75",
                    "€100",);

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
    shuffle($sCAmount);
      $value = $sCAmount[rand(0, count($sCAmount) - 1)];
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
    
    $_SESSION["p17"] =  $randomAmount[0]; 
    $_SESSION["p18"] =  $randomAmount[1]; 
    $_SESSION["p19"] =  $randomAmount[2]; 
    $_SESSION["p20"] =  $randomAmount[3]; 
    $_SESSION["p21"] =  $randomAmount[4]; 
    $_SESSION["p22"] =  $randomAmount[5]; 
    $_SESSION["p23"] =  $randomAmount[6]; 
    $_SESSION["p24"] =  $randomAmount[7]; 
    if($feCount >= 3)
    {

      $sql = "SELECT * FROM scratchcards Where id = '$id' AND `type` = '3' ";
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
      $sql = "UPDATE `scratchcards` SET `freego`= '$newfeegoAmount', `date`='$currentTime' WHERE `id` = '$id' AND `type` = '3'";
      if ($conn->query($sql) === TRUE) 
      {

          $_SESSION["scMss3"] = "Congratulations you Won a Free Scratch Card";
          $sql = "SELECT `freego` FROM `scratchcards` Where `id` = '$id' AND `type` = '3' ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc()) 
                  {
                    $dbfreego = $row['freego'];
                    $_SESSION["fg3"] = $dbfreego;
                  }

          }
          else
          {
            $sql = "INSERT INTO `scratchcards` (type,freego,date,id) VALUES ('3','1','$currentTime','$id')";
            if ($conn->query($sql) === TRUE) 
            {

            $sql = "SELECT `freego` FROM `scratchcards` Where `id` = '$id' AND `type` = '3' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc()) 
                    {
                      $dbfreego = $row['freego'];
                      $_SESSION["fg3"] = $dbfreego;
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
          $_SESSION["scMss3"] = "Congradulations you Won €2";              
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
         $_SESSION["scMss3"] = "Congradulations you Won €4";              
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
          $_SESSION["scMss3"] = "Congradulations you Won €5";               
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
          $_SESSION["scMss3"] = "Congradulations you Won €10";              
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
          $_SESSION["scMss3"] = "Congradulations you Won €15";              
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
         $_SESSION["scMss3"] = "Congradulations you Won €20";              
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
          $_SESSION["scMss3"] = "Congradulations you Won €25";               
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
          $_SESSION["scMss"] = "Congradulations you Won €50";              
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
          $_SESSION["scMss3"] = "Congradulations you Won €75";              
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
          $_SESSION["scMss3"] = "Congradulations you Won €100";              
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else
    {
      $_SESSION["scMss3"] = "No Win, Try Again";
    }
    
}

?>