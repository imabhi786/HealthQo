<?php
// define variables and set to empty values
$hos_name = $email = $name_person = $password = $mobile = $hos_address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
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
</head>
<body> 
<center>
    <h2>Sign In</h2>
	<div class = "form_container">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label>Hospital Name</label><br>
			<input type="text" name="name" required><br>
			<label>Type</label><br>
			<select>
			    <option value="Admin">Admin</option>	
			    <option value="Doctor">Doctor</option>
			    <option value="Patient">Patient</option>
			</select><br>
			<label>Email</label><br>
			<input type="email" name="email" required><br>
			<label>Password</label><br>
			<input type="password" name="adpassword" required><br>
			<input type="submit" name="submit">	
		</form>
	</div>
</center>	
</body>
</html>	