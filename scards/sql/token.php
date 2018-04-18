<?php
include 'db.php';
session_start();

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$str = str_shuffle($str);
$str = substr($str, 0, 16);
date_default_timezone_set('Europe/Dublin');
$currentTime = date('Y-m-d H:i:s');




                     
if(isset($_SESSION['sg1']))
{
	$sql = "INSERT INTO giftcards (type,token,date,valid) VALUES ('1','$str','$currentTime','YES')";
	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['sc1t'] = $str;
		header("Location:../giftcard.php");
	}
	else
	{
		echo "Error";
	}
}
if(isset($_SESSION['sg2']))
{
	$sql = "INSERT INTO giftcards (type,token,date,valid) VALUES ('2','$str','$currentTime','YES')";
	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['sc1t'] = $str;
		header("Location:../giftcard.php");
	}
	else
	{
		echo "Error";
	}
}
if(isset($_SESSION['sg3']))
{
	$sql = "INSERT INTO giftcards (type,token,date,valid) VALUES ('3','$str','$currentTime','YES')";
	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['sc1t'] = $str;
		header("Location:../giftcard.php");
	}
	else
	{
		echo "Error";
	}
}
if(isset($_SESSION['sg4']))
{
	$sql = "INSERT INTO giftcards (type,token,date,valid) VALUES ('4','$str','$currentTime','YES')";
	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['sc1t'] = $str;
		header("Location:../giftcard.php");
	}
	else
	{
		echo "Error";
	}
}
if(isset($_SESSION['sg5']))
{
	$sql = "INSERT INTO giftcards (type,token,date,valid) VALUES ('5','$str','$currentTime','YES')";
	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['sc1t'] = $str;
		header("Location:../giftcard.php");
	}
	else
	{
		echo "Error";
	}
}
if(isset($_SESSION['sg6']))
{
	$sql = "INSERT INTO giftcards (type,token,date,valid) VALUES ('6','$str','$currentTime','YES')";
	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['sc1t'] = $str;
		header("Location:../giftcard.php");
	}
	else
	{
		echo "Error";
	}
}
else
{
	echo "didn't work";
}


?>
