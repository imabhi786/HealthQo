<?php

	include("config.php");
	session_start();
	$hosname = $email = $name = $password = $mobile = $hosadd = $type = $typo = "";
   
    function test_input($data)
    {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


	$hosname = test_input($_POST["hosname"]);
	$type = test_input($_POST["type"]);
	$typo = test_input($_POST["typo"]);
	$name = test_input($_POST["name"]);
	$email = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);
	$mobile = test_input($_POST["mobile"]);
	
    
	if($typo == 'doctor'){
	$sql = "SELECT * from HosDoc where email='$email'";
	if($result = mysqli_query($db,$sql))
	{
		$rowcount = mysqli_num_rows($result);
		// echo $rowcount;
		
		if($rowcount>=1)
		{
			// echo "Already Registered";
			// header("location:signup.php");
			echo '<script language="javascript">';
			echo 'alert("Already Registered")';
			echo '</script>';
		}
		else
		{
			$query = "INSERT INTO HosDoc (hosname,name,email,password,mobile,type) VALUES('$hosname','$name','$email','$password','$mobile','$type')";
			if($db->query($query))
			{
				$_SESSION['login_user'] = $email;
				header("location:signin.php");
			}
			else
			{
				echo "Error :<br>".$db->error;
				echo "Entry Not Added Successfully !"; 
			}
		}
	}
    }
    else if($typo== 'patient')
    {
    	$sql = "SELECT * from HosPat where email='$email'";
		if($result = mysqli_query($db,$sql))
		{
			$rowcount = mysqli_num_rows($result);
			// echo $rowcount;
			
			if($rowcount>=1)
			{
				// echo "Already Registered";
				// header("location:signup.php");
				echo '<script language="javascript">';
				echo 'alert("Already Registered")';
				echo '</script>';
			}
			else
			{
				$query = "INSERT INTO HosPat (hosname,name,email,password,mobile,type) VALUES('$hosname','$name','$email','$password','$mobile','$type')";
				if($db->query($query))
				{
					$_SESSION['login_user'] = $email;
					header("location:signin.php");
				}
				else
				{
					echo "Error :<br>".$db->error;
					echo "Entry Not Added Successfully !"; 
				}
			}
		}
    }
	


?>