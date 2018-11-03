<?php

include("config.php");
session_start();
$hosname = $email = $name = $password = $mobile = $hosadd = "";
function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$hosname = test_input($_POST["hosname"]);
	$hosadd = test_input($_POST["hosadd"]);
	$name = test_input($_POST["name"]);
	$email = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);
	$mobile = test_input($_POST["mobile"]);
	
	$_SESSION['type'] = 'Admin';
	$sql = "SELECT hosadd from HosAdm where hosname = '$hosname' OR email='$email'";
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
			$query = "INSERT INTO HosAdm (hosname,hosadd,name,email,password,mobile) VALUES('$hosname','$hosadd','$name','$email','$password','$mobile')";
			if($db->query($query))
			{
				$_SESSION['login_user'] = $email;
				header("location:main.php");
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
<html>	
<head>
	<script>
	</script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Quicksand" rel="stylesheet">
</head>
<body> 
<center>
    <h2>Sign UP</h2>
	<div class = "form_container">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label>Hospital Name</label><br>
			<input type="text" name="hosname" required><br>
			<label>Hospital Address</label><br>
			<input type="text" name="hosadd" required><br>
			<label>Name</label><br>
			<input type="text" name="name" required><br>
			<label>Email</label><br>
			<input type="email" name="email" required><br>
			<label>Password</label><br>
			<input type="password" name="password" required><br>
			<label>Mobile Number</label><br>
			<input type="text" name="mobile" required><br><br>
			<input type="submit" name="submit">	
		</form>
	</div>
</center>	
</body>
</html>	