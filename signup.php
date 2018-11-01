<?php
// define variables and set to empty values
$hos_name = $email = $name_person = $password = $mobile = $hos_address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $hos_name = test_input($_POST["hos_name"]);
  $name_person = test_input($_POST("name_person"));
  $hos_address  = test_input($_POST("address"));
  $email = test_input($_POST["email"]);
  $password = test_input($_POST("password"));
  $mobile = test_input($_POST("mobile"));
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
    <h2>Sign UP</h2>
	<div class = "form_container">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label>Hospital Name</label><br>
			<input type="text" name="hos_name" required><br>
			<label>Hospital Address</label><br>
			<input type="text" name="address" required><br>
			<label>Name</label><br>
			<input type="text" name="name_person" required><br>
			<label>Email</label>
			<input type="email" name="email" required>
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