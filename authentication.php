<?php

include("config.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$hosname = test_input($_POST["hosname"]);
$hosadd = test_input($_POST["hosadd"]);
$name = test_input($_POST["name"]);
$email = test_input($_POST["email"]);
$password = test_input($_POST["password"]);
$mobile = test_input($_POST["mobile"]);

$sql = "SELECT hosadd from HosAdm where hosname = '$hosname' OR email='$email'";
if($result = mysqli_query($db,$sql))
{
	$rowcount = mysqli_num_rows($result);
	// echo $rowcount;
	
	if($rowcount>=1)
	{
		// echo "Already Registered";
		header("location:signup.php");
		echo '<script language="javascript">';
		echo 'alert("Already Registered")';
		echo '</script>';
		
		exit;
	}
	else
	{
		$query = "INSERT INTO HosAdm (hosname,hosadd,name,email,password,mobile) VALUES('$hosname','$hosadd','$name','$email','$password','$mobile')";
		if($db->query($query))
		{
			header("location:main.php");
		}
		else
		{
			echo "Error :<br>".$db->error;
			echo "Entry Not Added Successfully !"; 
		}
	}
}

?>