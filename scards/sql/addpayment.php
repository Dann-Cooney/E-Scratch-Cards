<!--
  ___________________________________________________________	
 |															 |
 |	Authors:        | Daniel Cooney                          |
 |	Start Date: 	| 20/02/18                               |
 |	Descritpion: 	| An authentication mechanism for        |
 |					| a web application                      |
 |	Last Updated: 	| Date - 23/02/18 || Time - 01:52am      |
 |	Bug Report[0]   |                                        |  
 |___________________________________________________________|

-->



<?php 


include 'db.php';
session_start();

$id = $_SESSION["id"];
$owner = $_POST['owner'];
$cvv = $_POST['cvv'];
$cardno = $_POST['cardNumber'];
$expirymonth = $_POST['expirymonth'];
$expiryyear = $_POST['expiryyear'];

$expirydate = $expiryyear."00".$expirymonth;
date_default_timezone_set('Europe/Dublin');
$currentTime = date('Y-m-d');
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "INSERT INTO usercards (id,owner,cvv,cardno,expirydate,cardadded) VALUES ('$id','$owner','$cvv','$cardno','$expirydate','$currentTime')";

if ($conn->query($sql) === TRUE) 
{

     	header("Location:../accdetails.php");
    
} 
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
			
?>
