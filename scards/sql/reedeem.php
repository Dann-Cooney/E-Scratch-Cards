<!--
  ___________________________________________________________	
 |															 |
 |	Author:       	| Daniel Cooney                          |
 |	Descritpion: 	| Checking data from register form and   |
 |					| puttig it ito the database.            |
 |					|                                        |
 |	            	|                                        |
 |	                |                                        |  
 |___________________________________________________________|

-->



<?php 

//Checking the connection.
session_start();
include 'db.php';
$id = $_SESSION["id"];

$p1= $_POST['p1'];
$p2= $_POST['p2'];
$p3= $_POST['p3'];
$p4= $_POST['p4'];

$enteredToken = $p1.$p2.$p3.$p4;


$sql = "SELECT * FROM giftcards";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) 
    {
        $dbtoken = $row['token'];
        $_SESSION["dbtoken "] = $dbtoken;

        if( $dbtoken == $enteredToken )
        {
            $check = "1";
            $card = $row['type'];
            break;  
        }
        else
        {
            $check = "0";
        }                           
    }
    
    if($check == "1")
    {
        if($card == "1")
        {
            $sql = "SELECT * FROM scratchcards Where id = '$id' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    date_default_timezone_set('Europe/Dublin');
                    $currentTime = date('Y-m-d H:i:s');
                    $dbfreego = $row['freego'];
                    $dbtoken = $row['token'];
                    $newfeegoAmount = $dbfreego + 1;
                } 

                $sql = "UPDATE `scratchcards` SET `freego`= '$newfeegoAmount', `date`='$currentTime' WHERE `id` = '$id' AND `type` = '1'";
                if ($conn->query($sql) === TRUE) 
                {
                    $token = $_SESSION["dbtoken "];
                    $sql = "DELETE FROM `giftcards` WHERE `token`= '$token'";

                    if ($conn->query($sql) === TRUE) 
                    {

                       $_SESSION['reMsg'] = "You just unlocked a type Easy Scratch Scratch Card";
                       header("Location:../reedeem.php");
                    } 
                    else 
                    {
                       $_SESSION['reMsg'] = "DB TOKEN:";
                       header("Location:../reedeem.php");
                    }

                    
                }
            }
        }

        if($card == "2")
        {
            $sql = "SELECT * FROM scratchcards Where id = '$id' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    date_default_timezone_set('Europe/Dublin');
                    $currentTime = date('Y-m-d H:i:s');
                    $dbfreego = $row['freego'];
                    $dbtoken = $row['token'];
                    $newfeegoAmount = $dbfreego + 1;
                } 

                $sql = "UPDATE `scratchcards` SET `freego`= '$newfeegoAmount', `date`='$currentTime' WHERE `id` = '$id' AND `type` = '2'";
                if ($conn->query($sql) === TRUE) 
                {
                    $token = $_SESSION["dbtoken "];
                    $sql = "DELETE FROM `giftcards` WHERE `token`= '$token'";

                    if ($conn->query($sql) === TRUE) 
                    {

                       $_SESSION['reMsg'] = "You just unlocked a type A Bit Of Luck Scratch Card";
                       header("Location:../reedeem.php");
                    } 
                    else 
                    {
                       $_SESSION['reMsg'] = "DB TOKEN:";
                       header("Location:../reedeem.php");
                    }

                    
                }
            }
        }
        if($card == "3")
        {
            $sql = "SELECT * FROM scratchcards Where id = '$id' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    date_default_timezone_set('Europe/Dublin');
                    $currentTime = date('Y-m-d H:i:s');
                    $dbfreego = $row['freego'];
                    $dbtoken = $row['token'];
                    $newfeegoAmount = $dbfreego + 1;
                } 

                $sql = "UPDATE `scratchcards` SET `freego`= '$newfeegoAmount', `date`='$currentTime' WHERE `id` = '$id' AND `type` = '3'";
                if ($conn->query($sql) === TRUE) 
                {
                    $token = $_SESSION["dbtoken "];
                    $sql = "DELETE FROM `giftcards` WHERE `token`= '$token'";

                    if ($conn->query($sql) === TRUE) 
                    {

                       $_SESSION['reMsg'] = "You just unlocked a Test The Bank Scratch Card";
                       header("Location:../reedeem.php");
                    } 
                    else 
                    {
                       $_SESSION['reMsg'] = "DB TOKEN:";
                       header("Location:../reedeem.php");
                    }

                    
                }
            }
        }
        if($card == "4")
        {
            $sql = "SELECT * FROM scratchcards Where id = '$id' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    date_default_timezone_set('Europe/Dublin');
                    $currentTime = date('Y-m-d H:i:s');
                    $dbfreego = $row['freego'];
                    $dbtoken = $row['token'];
                    $newfeegoAmount = $dbfreego + 1;
                } 

                $sql = "UPDATE `scratchcards` SET `freego`= '$newfeegoAmount', `date`='$currentTime' WHERE `id` = '$id' AND `type` = '4'";
                if ($conn->query($sql) === TRUE) 
                {
                    $token = $_SESSION["dbtoken "];
                    $sql = "DELETE FROM `giftcards` WHERE `token`= '$token'";

                    if ($conn->query($sql) === TRUE) 
                    {

                       $_SESSION['reMsg'] = "You just unlocked a A Bigger Chance Scratch Card";
                       header("Location:../reedeem.php");
                    } 
                    else 
                    {
                       $_SESSION['reMsg'] = "DB TOKEN:";
                       header("Location:../reedeem.php");
                    }

                    
                }
            }
        }
        if($card == "5")
        {
            $sql = "SELECT * FROM scratchcards Where id = '$id' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    date_default_timezone_set('Europe/Dublin');
                    $currentTime = date('Y-m-d H:i:s');
                    $dbfreego = $row['freego'];
                    $dbtoken = $row['token'];
                    $newfeegoAmount = $dbfreego + 1;
                } 

                $sql = "UPDATE `scratchcards` SET `freego`= '$newfeegoAmount', `date`='$currentTime' WHERE `id` = '$id' AND `type` = '5'";
                if ($conn->query($sql) === TRUE) 
                {
                    $token = $_SESSION["dbtoken "];
                    $sql = "DELETE FROM `giftcards` WHERE `token`= '$token'";

                    if ($conn->query($sql) === TRUE) 
                    {

                       $_SESSION['reMsg'] = "You just unlocked a All Scratched Out Scratch Card";
                       header("Location:../reedeem.php");
                    } 
                    else 
                    {
                       $_SESSION['reMsg'] = "DB TOKEN:";
                       header("Location:../reedeem.php");
                    }

                    
                }
            }
        }
        if($card == "6")
        {
            $sql = "SELECT * FROM scratchcards Where id = '$id' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    date_default_timezone_set('Europe/Dublin');
                    $currentTime = date('Y-m-d H:i:s');
                    $dbfreego = $row['freego'];
                    $dbtoken = $row['token'];
                    $newfeegoAmount = $dbfreego + 1;
                } 

                $sql = "UPDATE `scratchcards` SET `freego`= '$newfeegoAmount', `date`='$currentTime' WHERE `id` = '$id' AND `type` = '6'";
                if ($conn->query($sql) === TRUE) 
                {
                    $token = $_SESSION["dbtoken "];
                    $sql = "DELETE FROM `giftcards` WHERE `token`= '$token'";

                    if ($conn->query($sql) === TRUE) 
                    {

                       $_SESSION['reMsg'] = "You just unlocked a Big Winner Scratch Card";
                       header("Location:../reedeem.php");
                    } 
                    else 
                    {
                       $_SESSION['reMsg'] = "DB TOKEN:";
                       header("Location:../reedeem.php");
                    }

                    
                }
            }
        }
        else
        {
            $_SESSION['reMsg'] = "ERROR 2";
            header("Location:../reedeem.php");
        }
       
    }
    else
    {
        $_SESSION['reMsg'] = "This token is invalid";
        header("Location:../reedeem.php");
    }
}
else
{
    ECHO "DATABASE EMPTY";
}
?>
