<?php 

	$servername = "";
	$username = "";
	$password = "";
	$dbname = "";

    $con = new mysqli($servername, $username, $password, $dbname);
	mysqli_select_db($con, 'contactme');
    if(!$con)
    {
        echo 'Not connected';
	}
	if(isset($_POST["name"]))  
 	{
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			echo "Invalid email format"; 
		}
		else
		{
			$sql = "INSERT INTO contactme (name, email ,message)"." VALUES ('$name','$email','$message')";
			if(mysqli_query($con,$sql))
			{
				echo "Your message has been received";
			}
			else
			{
				echo "Sorry try again";
			}
		}
	}
?>