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
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>HealthQo</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body> 
<nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.html" class="brand-logo">HealthQo</a>
      <ul class="right hide-on-med-and-down">
        <li class="active"><a href="create.php">Create Admin</a></li>
        <li><a href="signin.php">Sign In</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li class="active"><a href="create.php">Create Admin</a></li>
        <li><a href="signin.php">Sign In</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

<center>
    <h3>Sign Up</h3>
    

  <div class="row" style="width:80%">
    <form class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">home</i>
          <input id="hosp_name" type="text" class="validate" name="hosname" required>
          <label for="hosp_name">Hospital Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="your_name" type="text" class="validate" name="name" required>
          <label for="your_name">Your Name</label>
        </div>
      </div>
     <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input id="hosp_addr" type="text" class="validate" name="hosadd" required>
          <label for="hosp_addr">Hospital Address</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Email</label>
          <span class="helper-text" data-error="wrong" data-success="right" style="text-align:left">abc@xyz.com</span>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">lock_outline</i>
          <input id="your_pass" type="password" class="validate" name="password" required>
          <label for="your_pass">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="your_mob" type="number" class="validate" name="mobile" required>
          <label for="your_mob">Mobile number</label>
        </div>
      </div>
    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
    </form>
  </div>
</center>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
<script src="js/init.js"></script>	
</body>
</html>	