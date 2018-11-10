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
        <li><a href="create.php">Create Admin</a></li>
        <li class="active"><a href="signin.php">Sign In</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="create.php">Create Admin</a></li>
        <li class="active"><a href="signin.php">Sign In</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<center>
    <h2>Sign UP</h2>
	<div class="row" style="width:80%">
	 <form class="col s12" method="post" action="accept.php">
			<input type="hidden" name="type" value = "<?php echo $type ?>" required><br>
			<input type="hidden" name="typo" value = "<?php echo $typo ?>" required><br>
			<div class="row">
			<div class="input-field col s6">
          <i class="material-icons prefix">home</i>
          <input id="hosp_name" type="text" class="validate" name="hosname" value = "<?php echo $hosname ?>" required readonly>
          <label for="hosp_name">Hospital Name</label>
        </div>
			<!-- <label>Hospital Address</label><br> -->	
         <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="your_name" type="text" class="validate" name="name" required>
          <label for="your_name">Your Name</label>
            </div></div>
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