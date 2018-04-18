<?php
include 'db.php';
include 'resetSession.php';
  include 'sql/db.php';

session_start();

$strForSession = $_SESSION["PreAuthSess"];


echo $strForSession;

$sql = "DELETE FROM `privatesession` WHERE `SessionID`= '$strForSession'";
if (!mysqli_query($conn,$sql))  
{
	die('Error: ' . mysqli_error($conn));
	echo "Error in active session insert <br/>";
}
else
{
	$query = mysqli_query($conn,$sql);
	$_SESSION["PreAuthSess"] = "";	
	session_regenerate_id();
	unset($_SESSION["PreAuthSess"]);
	unset($_SESSION["id"]);
	session_destroy();
	header("Location:../index.php");
   	die();
}




?>
