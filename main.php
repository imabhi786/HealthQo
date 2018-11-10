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
       <li class="active"><a href="main.php">Home</a></li>
        <li><a href="profile.php?email=<?php echo $_SESSION['login_user']; ?>&type=<?php echo $_SESSION['type']; ?>&q3=<?php echo $login_session_1; ?>">Profile</a></li>
        <li><a href="database.php">Database</a></li>
        <li><a href="appointments.php">Appointments</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
       <li class="active"><a href="main.php">Home</a></li>
        <li><a href="profile.php?email=<?php echo $_SESSION['login_user']; ?>&type=<?php echo $_SESSION['type']; ?>&q3=<?php echo $login_session_1; ?>">Profile</a></li>
        <li><a href="database.php">Database</a></li>
        <li><a href="appointments.php">Appointments</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
    <div class="row" style="width:80%"><div>
				<?php
				echo '<h3>'.$login_session_1.' ('.$type.')</h3>';
				?>
		    </div></div>
  <div class="row center" style="width:80%">
  <div class="col s6" style="padding-top:10px">
  <a class="waves-effect waves-light btn-large" onclick="openmodal('Doc')">Invite Doctor</a>
      </div>
       <div class="col s6" style="padding-top:10px">
     <a class="waves-effect waves-light btn-large" onclick="openmodal('Pat')">Add Patient</a>
      </div>
    </div>
	<div class="main_body">
<!--
		<div class="vl">
		</div>
-->
		<div class="row card-panel teal lighten-4"><div class="row center" style="width:85%">
			<div class="col s6 card-panel teal" style="margin-right:5%;width:45%;margin-bottom:-3px">
					<div class="row center" style="padding-top:15px">
					   <div class="col s6 center" style="font-size:30px">Doctor's Class</div>
					   <div class="page1 col s6">
					    <div style="float:right" onclick="openmodal('Add_Doc')">
					    	 <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
					    </div>
				    </div>
				   	</div>
			</div>
			<div class="col s6 card-panel teal" style="margin-left:5%;width:45%;margin-bottom:-3px">
				<div class="row center" style="padding-top:15px">
                    <div class="col s6 center" style="font-size:30px">Patient's Class</div>
               <div class="page1 col s6">
				    <div style="float:right" onclick="openmodal('Add_Pat')"> <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a></div>
				</div>
                </div>
			</div>
		</div>
		<div class = "row" style="width:85%;margin-top:-40px">
		<div class="col s6 card-panel teal lighten-5" style="margin-right:5%;width:45%;padding-top:15px;padding-bottom:15px">
			<?php
				include('config.php');
				$sql = "select type from class_Doc";
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
							    <a href="type.php?name='.$login_session_1.'&type='.$value.'&category=doctor">'.$value.'</a>
          					    <div class="page2">
					                <div class="tab" id="tab" style="float:right" onclick="openmodal('.$id.')">
					    	        <i class="material-icons">delete</i></a>
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
				$sql = "select type from class_pat";
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
							    <a href="type.php?name='.$login_session_1.'&type='.$value.'&category=patient">'.$value.'</a>
          					    <div class="page2">
					                <div class="tab" id="tab" style="float:right" onclick="openmodal('.$id.')">
					    	         <i class="material-icons">delete</i>
					                </div>
				                 </div>  
				             </div>';
 						    }
						}
					}
				}
			?>
		</div>
	</div></div>
	</div>
	<div class="modal" id="Add_Doc">
	<div class="modal-content">
		<div class="close" onclick="closemodal('Add_Doc')">&times;</div>
		<div class="">
			<h2>Add Doctor's Class</h2><br>
		</div>
		<div class="modal-body">
			<form method="post" action="addclass.php">
				<div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">local_hotel</i>
          <input id="classtype" type="text" class="validate" name="classtype" required>
          <label for="classtype">Doctor's Class</label>
        </div>
      </div>
				<center><button class="btn waves-effect waves-light" type="submit" name="Add_Doc">Add
  </button></center><br><br>
			</form>
		</div>
	</div>
    </div>
    <div class="modal" id="Add_Pat">
	<div class="modal-content">
		<div class="close" onclick="closemodal('Add_Pat')">&times;</div>
		<div class="modal-header">
			<h2>Add Patient's Class</h2><br>
		</div>
		<div class="modal-body">
			<form method="post" action="addclass.php">
			<div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">local_hotel</i>
          <input id="classtype" type="text" class="validate" name="classtype" required>
          <label for="classtype">Patient's Class</label>
        </div>
      </div>
				<center><button class="btn waves-effect waves-light" type="submit" name="Add_Pat">Add
  </button></center><br><br>
			</form>
		</div>
	</div>
    </div>
	<div class="modal" id="Doc">
	<div class="modal-content" style="overflow-y: scroll">
		<div class="close" onclick="closemodal('Doc')">&times;</div>
		<div class="modal-header">
			<h2>Invite Doctor</h2><br>
		</div>
		<div class="modal-body">
			<form method="post" action="invite.php">
						 <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Doctor's Email</label>
          <span class="helper-text" data-error="wrong" data-success="right" style="text-align:left">abc@xyz.com</span>
                     </div></div>
                     <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">local_hotel</i>
          <input id="type" type="text" class="validate" name="type" required>
          <label for="type">Type</label>
        </div>
      </div>
				<input type="hidden" name="doc" value="doctor">
				<center><button class="btn waves-effect waves-light" type="submit" name="action">Invite
  </button></center><br><br>
			</form>
		</div>
	</div>
    </div>
    <div class="modal" id="Pat">
	<div class="modal-content" style="overflow-y: scroll">
		<div class="close" onclick="closemodal('Pat')">&times;</div>
		<div class="modal-header">
			<h2>Add Patient</h2><br>
		</div>
		<div class="modal-body">
			<form method="post" action="invite.php">
				 <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Patient's Email</label>
          <span class="helper-text" data-error="wrong" data-success="right" style="text-align:left">abc@xyz.com</span>
                     </div></div>
                     <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">local_hotel</i>
          <input id="type" type="text" class="validate" name="type" required>
          <label for="type">Type</label>
        </div>
      </div>
				<input type="hidden" name="doc" value="patient">
				<center><button class="btn waves-effect waves-light" type="submit" name="action">Invite
  </button></center><br><br>
			</form>
		</div>
	</div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
<script src="js/init.js"></script>
</body>
</html>