<!--
  ___________________________________________________________	
 |															 |
 |	Author:         | Daniel Cooney                          |
 |	Start Date: 	| 2/10/17                                |
 |	Descritpion: 	| Connection to the blacknight server    |
 |	Last Updated: 	| Date - 17/3/18 || Time - 00:10am       |    
 |___________________________________________________________|

-->
<?php

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbName = 'scratchcards';

	$conn = new mysqli($servername, $username, $password, $dbName) or die("Couldn't Connect");

	
 

       
?>
