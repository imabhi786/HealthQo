<?php

include("config.php");
session_start();
$hosname = $email = $name = $password = $mobile = $hosadd = $type = $typo = "";
    if(isset($_GET["q1"])){
	$hosname = $_GET["q1"];
    }
    if(isset($_GET["q2"]))
	{
	$type = $_GET['q2'];
    }
    if(isset($_GET["q3"])){
    $typo = $_GET["q3"];
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
    <h2>Sign UP</h2>
	<div class = "form_container">
		<form method="post" action="accept.php">
			<!-- <label>Hospital Name</label><br> -->
			<input type="hidden" name="hosname" value = "<?php echo $hosname ?>"required><br>
			<!-- <label>Hospital Address</label><br> -->
			<input type="hidden" name="type" value = "<?php echo $type ?>" required><br>
			<input type="hidden" name="typo" value = "<?php echo $typo ?>" required><br>
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