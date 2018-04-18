<?php 

session_start();
include 'db.php';


if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$addamount = $_POST['amount'];
$id = $_SESSION["id"];
$sql = "SELECT balance FROM userfunds WHERE id = '$id'";
$result = $conn->query($sql);
// Check connection

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
    {
    	$currentBal = $row['balance'];
    }

  	$newAmount = $currentBal + $addamount;
  	$sql = "UPDATE userfunds SET balance='$newAmount' WHERE id = '$id'";


	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION["balance"] = $newAmount;
   		header("Location:../profile.php");
	} 
	else 
	{
    	echo "Error updating record: " . $conn->error;
    	header("Location:../addBalance.php");
	}  
}


$conn->close();
				
?>

