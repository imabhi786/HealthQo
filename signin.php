<?php
// define variables and set to empty values
include('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $hosname = test_input($_POST["hosname"]);
  $email = test_input($_POST["email"]);
  $type = test_input($_POST["type"]);
  $password = test_input($_POST["password"]);
  
  $myusername = mysqli_real_escape_string($db,$_POST['email']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']);
  $_SESSION['type'] = $type;
  if($type=="Admin")
  {
  	$sql = "SELECT * FROM HosAdm WHERE email = '$myusername' and password = '$mypassword'";
  	$result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
	if($count==1) {
	     // session_register("myusername");
	     $_SESSION['login_user'] = $myusername;
	     header("location: main.php");
	     
	}else if($count==0) {
	     echo '<script language="javascript">';
		 echo 'alert("Your Login Name or Password is invalid")';
		 echo '</script>';
	}
  }
  else if($type=="Doctor")
  {
  	$sql = "SELECT * FROM HosDoc WHERE email = '$myusername' and password = '$mypassword'";
  	$result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
	  if($count==1) {
	     // session_register("myusername");
	     $_SESSION['login_user'] = $myusername;
	     header("location: main_doc.php");
	     
	  }else if($count==0) {
	    echo '<script language="javascript">';
		 echo 'alert("Your Login Name or Password is invalid")';
		 echo '</script>';
	  }
  }
  else if($type=="Patient")
  {	
  	$sql = "SELECT * FROM HosPat WHERE email = '$myusername' and password = '$mypassword'";
  	$result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
	  if($count==1) {
	     // session_register("myusername");
	     $_SESSION['login_user'] = $myusername;
	     header("location: main_patient.php");
	     
	  }else if($count==0) {
	    echo '<script language="javascript">';
		 echo 'alert("Your Login Name or Password is invalid")';
		 echo '</script>';
	  }

  }

}  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<html>	
<head>
	<script>
	</script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Quicksand" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body> 
<center>
    <h2>Sign In</h2>
	<div class = "form_container">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label>Hospital Name</label><br>
			<input type="text" name="hosname" required><br>
			<label>Type</label><br>
			<select name = "type">
			    <option value="Admin">Admin</option>	
			    <option value="Doctor">Doctor</option>
			    <option value="Patient">Patient</option>
			</select><br>
			<label>Email</label><br>
			<input type="email" name="email" required><br>
			<label>Password</label><br>
			<input type="password" name="password" required><br><br>
			<input type="submit" name="submit">	
		</form>
	</div>
</center>	
</body>
</html>	