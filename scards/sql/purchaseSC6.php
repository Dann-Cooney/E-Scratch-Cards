<?php  
$fname = $_SESSION["currentUser"];
$id = $_SESSION["id"];
$_SESSION["p41"] = 0;
$_SESSION["p42"] = 0;
$_SESSION["p43"] = 0;
$_SESSION["p44"] = 0;
$_SESSION["p45"] = 0;
$_SESSION["p46"] = 0;
$_SESSION["p47"] = 0;
$_SESSION["p48"] = 0;

$sql = "SELECT `freego` FROM `scratchcards` Where `id` = '$id' ";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
  while($row = $result->fetch_assoc()) 
    {
      $dbfreego = $row['freego'];
      $_SESSION["fg6"] = $dbfreego;
    }

}
else
{
   echo "not working";
}

      
if($_GET)
{
  if(isset($_GET['sc6']))
  {
      purchasecard6();
  }
  if(isset($_GET['usefreego6']))
  {
      usefreego6();
  } 
}

//-----------------------FREE GO----------------------//
function usefreego6() 
{
  include 'sql/db.php';
  $id = $_SESSION["id"];

  $sql = "SELECT * FROM scratchcards Where id = '$id' AND type = '6'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc())
    {
      $dbfreego6 = $row['freego'];
    } 
  }

  if($dbfreego6 > 0 )
  {
    $dbfreego6 = $dbfreego6 - 1;
    $sql = "UPDATE `scratchcards` SET `freego`= '$dbfreego5' WHERE `id` = '$id' AND type = '6'";
    if ($conn->query($sql) === TRUE) 
    {
      $_SESSION["fg6"] = $dbfreego6;
      calscratch5();
    }
    else
    {
      echo "didn't work";
    }

  }
  // 0 Scratch cards left
  else
  {
     $_SESSION["scMss6"] = "Sorry, You don't have any free scratch cards left";
  }
}

//-----------------------/FREE GO----------------------//


function purchasecard6() 
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
      $newbalance = $dbbalance - 10;
      $_SESSION["balance"] =  $newbalance;
    }
  } 
  $sql = "UPDATE `userfunds` SET `balance`= '$newbalance' WHERE `id` = '$id'";
  if ($conn->query($sql) === TRUE) 
  {
    calscratch6();
  } 
}



function calscratch6()
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
    
    $_SESSION["p41"] =  $randomAmount[0]; 
    $_SESSION["p42"] =  $randomAmount[1]; 
    $_SESSION["p43"] =  $randomAmount[2]; 
    $_SESSION["p44"] =  $randomAmount[3]; 
    $_SESSION["p45"] =  $randomAmount[4]; 
    $_SESSION["p46"] =  $randomAmount[5]; 
    $_SESSION["p47"] =  $randomAmount[6]; 
    $_SESSION["p48"] =  $randomAmount[7]; 
    if($feCount >= 3)
    {

      $sql = "SELECT * FROM scratchcards Where id = '$id'";
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
      $sql = "UPDATE `scratchcards` SET `freego`= '$newfeegoAmount', `date`='$currentTime' WHERE `id` = '$id' AND `type` = '6'";
      if ($conn->query($sql) === TRUE) 
      {

          $_SESSION["scMss6"] = "Congratulations you Won a Free Scratch Card";
          $sql = "SELECT `freego` FROM `scratchcards` Where `id` = '$id' AND `type` = '6' ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc()) 
                  {
                    $dbfreego = $row['freego'];
                    $_SESSION["fg6"] = $dbfreego;
                  }

          }
          else
          {
            $sql = "INSERT INTO `scratchcards` (type,freego,date,id) VALUES ('6','1','$currentTime','$id')";
            if ($conn->query($sql) === TRUE) 
            {

            $sql = "SELECT `freego` FROM `scratchcards` Where `id` = '$id' AND `type` = '6' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc()) 
                    {
                      $dbfreego = $row['freego'];
                      $_SESSION["fg6"] = $dbfreego;
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
          $_SESSION["scMss6"] = "Congratulations you Won €2";              
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
         $_SESSION["scMss6"] = "Congratulations you Won €4";              
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
          $_SESSION["scMss6"] = "Congratulations you Won €5";               
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
          $_SESSION["scMss6"] = "Congratulations you Won €10";              
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
          $_SESSION["scMss6"] = "Congratulations you Won €15";              
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
         $_SESSION["scMss6"] = "Congratulations you Won €20";              
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
          $_SESSION["scMss6"] = "Congratulations you Won €25";               
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
          $_SESSION["scMss6"] = "Congratulations you Won €75";              
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
          $_SESSION["scMss6"] = "Congratulations you Won €100";              
      } 
      else 
      {
          echo "Error updating record: " . $conn->error;
      }
    }
    else
    {
      $_SESSION["scMss6"] = "No Win, Try Again";
    }
    
}

?>