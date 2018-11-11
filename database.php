<?php
   include('session.php');
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
  <link rel="stylesheet" href="css1/style.css">
  <script src="js1/script.js"></script>
</head>
<body>
<nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.html" class="brand-logo">HealthQo</a>
      <ul class="right hide-on-med-and-down">
       <li><a href="main.php">Home</a></li>
        <li><a href="profile.php?email=<?php echo $_SESSION['login_user']; ?>&type=<?php echo $_SESSION['type']; ?>&q3=<?php echo $login_session_1; ?>">Profile</a></li>
        <li class="active"><a href="database.php">Database</a></li>
        <li><a href="appointments.php">Appointments</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
       <li><a href="main.php">Home</a></li>
        <li><a href="profile.php?email=<?php echo $_SESSION['login_user']; ?>&type=<?php echo $_SESSION['type']; ?>&q3=<?php echo $login_session_1; ?>">Profile</a></li>
        <li class="active"><a href="database.php">Database</a></li>
        <li><a href="appointments.php">Appointments</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="row" style="width:80%"><div>
				<?php
				echo '<h3>'.$login_session_1.' ('.$type.')/Database</h3>';
				?>
		    </div></div>
	<div class="main_body">
	<div class="row card-panel teal lighten-4">
		<div class="row center" style="width:85%">
			<div class="col s6 card-panel teal" style="margin-right:5%;width:45%;margin-bottom:-3px">
					<div class="row center" style="padding-top:15px">
					   <div class="col s6" style="font-size:30px;text-align:center">Doctor's Class</div>
				   	</div>
			</div>
			<div class="col s6 card-panel teal" style="margin-left:5%;width:45%;margin-bottom:-3px">
				<div class="row center" style="padding-top:15px">
                    <div class="col s6" style="font-size:30px">Patient's Class</div>
                </div>
			</div>
        </div>
        
		<div class = "row" style="width:85%;margin-top:-40px">
		<div class="col s6 card-panel teal lighten-5" style="margin-right:5%;width:45%;padding-top:15px;padding-bottom:15px">
			<?php
				include('config.php');
				$sql = "select name from hosdoc";
				if($result = mysqli_query($db,$sql))
				{
					$rowcount = mysqli_num_rows($result);
					if($rowcount==0)
					{
						echo "Nothing Added Yet!";
					}
					else
					{
						$id="'delete'";
						$value="";
						while($field = mysqli_fetch_assoc($result))
						{
							foreach($field as $column => $value) {
							echo 
							'<div class = "boxed card-panel">
							    <a>'.$value.'</a>
          					    <div class="page2">
					                <div class="tab" id="tab" style="float:right" onclick="openmodal('.$id.')">
					    	        <i class = "fa fa-trash" style="font-size:20px"></i>
					                </div>
				                 </div>  
				             </div>';
 						    }
						}
					}
				}
			?>
		</div>
		<div class="col s6 card-panel teal lighten-5" style="margin-left:5%;width:45%;padding-top:15px;padding-bottom:15px">
			<?php
				// 	include('config.php');
				$sql = "select name from hospat";
				if($result = mysqli_query($db,$sql))
				{
					$rowcount = mysqli_num_rows($result);
					if($rowcount==0)
					{
						echo "Nothing Added Yet!";
					}
					else
					{
						$id="'delete'";
						$value="";
						while($field = mysqli_fetch_assoc($result))
						{
							foreach($field as $column => $value) {
							echo
							'<div class = "boxed card-panel">
							    <a>'.$value.'</a>
          					    <div class="page2">
					                <div class="tab" id="tab" style="float:right" onclick="openmodal('.$id.')">
					    	        <i class = "fa fa-trash" style="font-size:20px"></i>
					                </div>
				                 </div>  
				             </div>';
 						    }
						}
					}
				}
			?>
		</div>
	</div>
        </div></div>
</body>
</html>