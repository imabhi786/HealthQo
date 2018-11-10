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
	     header("location: profile.php?email=".$myusername."&type=Doctor&q3=".$hosname);
	     
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
	      header("location: profile.php?email=".$myusername."&type=Patient&q3=".$hosname);
	     
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
    <h3>Sign In</h3>
    
      <div class="row" style="width:80%">
    <form class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">home</i>
          <input id="hosp_name" type="text" class="validate" name="hosname" required>
          <label for="hosp_name">Hospital Name</label>
        </div>
        <div class="input-field col s6">
         <select name="type">
          <option value="" disabled selected>Who are you?</option>
          <option value="Admin" selected="selected">Admin</option>	
          <option value="Doctor">Doctor</option>
          <option value="Patient">Patient</option>
        </select>
        <label>User Type</label>
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
    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
    </form>
  </div>
</center>	
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script>
      $(document).ready(function(){
    $('select').formSelect();
  });
    
    </script>	
</body>
</html>	