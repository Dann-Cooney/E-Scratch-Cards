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

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$conn->close();
				
?>
