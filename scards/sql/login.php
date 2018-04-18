<!--
  ___________________________________________________________	
 |															 |
 |	Authors:        | Daniel Cooney                          |
 |	                                |  
 |___________________________________________________________|

-->

<?php 

include 'db.php';

if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
{
  $ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
{
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} 
else 
{
  $ip = $_SERVER['REMOTE_ADDR'];
}

$rport =  $_SERVER['REMOTE_PORT'];   
$browser = $_SERVER['HTTP_USER_AGENT'];
$strForSession = (string)$browser. (string)$ip;

session_start();

// MD5 Hash for the session
$strForSession = md5($strForSession);
$_SESSION["PreAuthSess"]=$strForSession;
$strForSession = $_SESSION["PreAuthSess"];

$name = $conn->real_escape_string($_POST["name"]);
$password = $conn->real_escape_string($_POST["password"]);
$objDateTime = new DateTime('NOW');





$result = $conn->query("SELECT * FROM activesession WHERE SessionID='$strForSession'");

// Active session already active
if ($result->num_rows > 0)
{
  $sql = "SELECT `Counter` FROM `activesession` WHERE `SessionID` = '$strForSession'";
  $result = mysqli_query($conn,$sql);

  if (!$result)
  {
    die('Could not query:' . mysql_error());
  }
  else
  {
    $counter = ($result->fetch_row()[0]);  
    // check above 4 because counter has been set to 0, eg (0,1,2,3,4), 5 counts locked.
    if ($counter > 4) 
    {
      header("Location:../tempLock.php");
    }
    else
    {
      $sql = "SELECT * FROM users";
      $result = $conn->query($sql);
      if ($result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
        {
          $dbfname = $row['fname'];
          $dbpassword = $row['pass'];
          if($name == $dbfname)
          {
            
            $sql = "SELECT id FROM users Where fname = '$dbfname' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
              while($row = $result->fetch_assoc()) 
              {
                $dbid = $row['id'];
                $check = "1";
                break;
              }
            }
            
          }
          else
          {
            $check = "0";
          }
        }
        if ($check == "1")
        {

          if ($name == "admin")
          {
            header("Location:../admin.php");
            die();
          }
          $activation = md5(random_int ( PHP_INT_MIN , PHP_INT_MAX )); //current time in microseconds to generate random number 
          $_SESSION["PreAuthSess"]=$activation;

          $sql = "DELETE FROM `privatesession` WHERE `Uid`= '$dbid'";
          if (!mysqli_query($conn,$sql))  
          {
            die('Error: ' . mysqli_error($conn));
            echo "Error in active session insert <br/>";
          }

          $sql="INSERT INTO `privatesession`(`SessionID`, `Uid`, `timeStamp`) VALUES ('$activation', '$dbid', NOW())";
          if (!mysqli_query($conn,$sql))
          {
            die('Error: ' . mysqli_error($conn));
            echo "Error in active session insert <br/>";
          }
          else
          {
            $sql = "UPDATE `activesession` SET `Counter`=0, `Tstamp` = NOW() WHERE `SessionID` = '$strForSession'";
            $result = mysqli_query($conn,$sql);
            if (!$result) 
            {
              die('Could not query:' . mysql_error());
            }

            $sql = "SELECT * FROM userfunds Where id = '$dbid' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
              while($row = $result->fetch_assoc()) 
              {
                $_SESSION["currentUser"] = $name;
                $_SESSION["id"] = $dbid;
                $_SESSION["balance"]= $row['balance'];
                $_SESSION["freego"]  = $row['freego'];
                header("Location:../profile.php");
                die();
              }
            } 
            else
            {
              echo "error";
            }      
          }
        }
        else
        {
          $counter = $counter + 1;
          $sql = mysqli_query($conn,"UPDATE  activesession SET Counter = '$counter', Tstamp = NOW()  WHERE SessionID='$strForSession'");
          $_SESSION['logMsg'] = "Please try again";
          header("Location:../login.php");
        }
      }
      else
      {
        $counter = $counter + 1;
        $sql = mysqli_query($conn,"UPDATE  activesession SET Counter = '$counter', Tstamp = NOW()  WHERE SessionID='$strForSession'");
        $_SESSION['logMsg'] = "Database Empty";
        header("Location:../login.php");
      } 
    }
  }
}
// No active session, this will create.
else
{
  $sql = "INSERT INTO `activesession` (`SessionID`, `Counter`, `Tstamp`) VALUES ('$strForSession', '0', NOW())";
  if ($conn->query($sql) === TRUE) 
  {
    $sql = "SELECT `Counter` FROM `activesession` WHERE `SessionID` = '$strForSession'";
    $result = mysqli_query($conn,$sql);
    if (!$result) 
    {
      die('Could not query:' . mysql_error());
    }
    else
    {
      $counter = ($result->fetch_row()[0]); 
      // check above 4 because counter has been set to 0, eg (0,1,2,3,4), 5 counts locked. 
      if ($counter > 4) 
      {
        header("Location:../tempLock.php");
      }
      else
      {
        $counter = $counter + 1;
        $sql = mysqli_query($conn,"UPDATE  activesession SET Counter = '$counter', Tstamp = NOW()  WHERE SessionID='$strForSession'");
        header("Location:login.php");
      }
    }
  }
  else 
  {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
		
?>
