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

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


///Not encrpyting yet, need to use this to compare to encrypted value in database first

$email = $_POST['email'];
$password = $_POST['password'];
$cpass = $_POST['confirm'];

//Encryptig the values from the form, for security reasons.
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$pass = $_POST['password'];
$selectOption = $_POST['county'];

$sql = "SELECT * FROM users";
$result = $conn->query($sql);


if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $dbEmail = $row['email'];

        //checking to see if the entered email is already in the database. 
        if($email==$dbEmail)
        {
        	$emailFound = "1";
        	break;
        }
        else
        {
        	$emailFound = "0";
        }
    }
    //EMAIL FOUND
    if($emailFound == "1")
    {
    	$_SESSION['here'] = "Email already exits ";
    	header("Location:../register.php");
    }
    //EMAIL NOT FOUND
    else
    {	//password validation process
    	//This can be  1 liner, but I wanted a different error message for each different errror. 
    	if ( strlen ($password) < 8  )
    	{
    		$_SESSION['here'] = "Password must be 8 Characters long";
    		header("Location:../register.php");
    	}
    	else if(!preg_match("#[0-9]+#", $password))
    	{
    		$_SESSION['here'] = "Password must contain a Number";
    		header("Location:../register.php");
    	}
    	else if(!preg_match("#[A-Z]+#", $password))
    	{
    		$_SESSION['here'] = "Password must contain a CaptiaL Case Letter";
    		header("Location:../register.php");
    	}
    	else if(!preg_match("#[a-z]+#", $password))
    	{
    		$_SESSION['here'] = "Password must contain a Lower Case Letter";
    		header("Location:../register.php");
    	}
    	else if(!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password))
    	{
    		$_SESSION['here'] = "Password must contain a Symbol";
    		header("Location:../register.php");
    	}
    	else
    	{
    		//Checking that the password and confirm password match
    		if($password != $cpass)
    		{
    			$_SESSION['here'] = "Password and Comfirm Password must match";
    			header("Location:../register.php");
    		}
    		else
    		{
    			//checking for a valid age and the user must be over 18
    			$birthDate = $_POST['dob'];
    			$birthDate = explode("-", $birthDate);

		        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
		        ? ((date("Y") - $birthDate[0]) - 1): (date("Y") - $birthDate[0])); 

		        if ($age <= 0)
		        {
		        	$_SESSION['here'] = "Invalid Age";
    				header("Location:../register.php"); 
		        }
		        else if ($age < 18 )
		        {
		            $_SESSION['here'] = "You must be over 18 to use this Application";
    				header("Location:../register.php");
		        }
		        else
		        {
		        	$sql = "INSERT INTO users (id,fname,lname,email,dob,pass,cpass,county) VALUES ('0','$fname','$lname','$email','$dob','$pass','$cpass','$selectOption')";

					if ($conn->query($sql) === TRUE) 
					{
                          $sql = "SELECT * FROM users WHERE fname = '$fname' ";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                              {
                                $dbid = $row['id'];
                              }
                            }
                          else
                          {
                            echo "error";
                          } 

						//All validations have been passed, user created.
						$sql = "INSERT INTO userfunds (id,balance) VALUES ('$dbid','0')";
						if ($conn->query($sql) === TRUE) 
						{

							header("Location:../login.php");
					    }
					} 
					else 
					{
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
		            
		        }
		    			
		   	}
    		
    	}
    }


}
else
{
    if ( strlen ($password) < 8  )
    {
        $_SESSION['here'] = "Password must be 8 Characters long";
        header("Location:../register.php");
    }
    else if(!preg_match("#[0-9]+#", $password))
    {
        $_SESSION['here'] = "Password must contain a Number";
        header("Location:../register.php");
    }
    else if(!preg_match("#[A-Z]+#", $password))
    {
        $_SESSION['here'] = "Password must contain a CaptiaL Case Letter";
        header("Location:../register.php");
    }
    else if(!preg_match("#[a-z]+#", $password))
    {
        $_SESSION['here'] = "Password must contain a Lower Case Letter";
        header("Location:../register.php");
    }
    else if(!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password))
    {
        $_SESSION['here'] = "Password must contain a Symbol";
        header("Location:../register.php");
    }
    else
    {    //Checking that the password and confirm password match
        if($password != $cpass)
        {
            $_SESSION['here'] = "Password and Comfirm Password must match";
            header("Location:../register.php");
        }
        else
        {
            $birthDate = $_POST['dob'];
            $birthDate = explode("-", $birthDate);

            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[0]) - 1): (date("Y") - $birthDate[0])); 

            if ($age <= 0)
            {
                $_SESSION['here'] = "Invalid Age";
                header("Location:../register.php"); 
            }
            else if ($age < 18 )
            {
                $_SESSION['here'] = "You must be over 18 to use this Application";
                header("Location:../register.php");
            }
            else
            {
                $sql = "INSERT INTO users (id,fname,lname,email,dob,pass,cpass,county) VALUES ('0','$fname','$lname','$email','$dob','$pass','$cpass','$selectOption')";

                if ($conn->query($sql) === TRUE) 
                {
                    $sql = "SELECT * FROM users WHERE fname = '$fname' ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                        while($row = $result->fetch_assoc()) 
                        {
                            $dbid = $row['id'];
                        }
                    }
                    else
                    {
                        echo "error";
                    } 

                    //All validations have been passed, user created.
                    $sql = "INSERT INTO userfunds (id,balance) VALUES ('$dbid','0')";
                    if ($conn->query($sql) === TRUE) 
                    {

                        header("Location:../login.php");
                    }
                } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                                
            }
            
        }
    }

}

$conn->close();
				
?>
