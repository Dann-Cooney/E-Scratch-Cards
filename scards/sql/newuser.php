<!--
  ___________________________________________________________	
 |															 |
 |	Authors:        | Daniel Cooney                          |
 |	                                |  
 |___________________________________________________________|

-->

<?php 

  include 'sql/db.php';

  $fname = $_SESSION["currentUser"];
  $id = $_SESSION["id"];


  $user = $_SESSION["currentUser"];
  date_default_timezone_set('Europe/Dublin');
  $currentTime = date('Y-m-d H:i:s');

  $sql = "SELECT `id` FROM `users` Where `fname` = '$user' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      $id = $row['id'];
    }

  }

  $sql = "SELECT `id` FROM `scratchcards` Where `id` = '$id' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
    // --- OLD USER DO NOTHING --//

  }
  else
  {// --- SETTING DEFAULT VALUES FOR NEW USERS --//
    $count = 0;
    $val = 1;
    while ($count < 7)
    {
    
      $sql = "INSERT INTO scratchcards (type,freego,date,id) VALUES ('$val','0','$currentTime',$id)";
      if ($conn->query($sql) === TRUE) 
      {
        $val = $val + 1;
        $count++;
      }

    }
  }
$conn->close();
		
?>
