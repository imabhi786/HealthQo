<?php
   include('session.php');
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Quicksand" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script>
    	
    </script>
</head>
<body>
	<div class="main_body">
		<div class="header">
			<div>
				<?php
				echo '<h1>'.$login_session_1.'</h1>';
				?>
		    </div>
		</div>
		<div class="flexed">
			<div class="page">
				<div class="tab" style="float: right" onclick="navigation()"><i class="fa fa-bars"></i></div>
				<div class="menu" id="navmenu">
					<a>
						<div class="menu-ele" onclick="openmodal('Doc')">
							Invite Doctor
						</div>
					</a>
					<a>
						<div class="menu-ele" onclick="openmodal('Pat')">
							Invite Patient
						</div>
					</a>
					<a href="profile.php?email=<?php echo $_SESSION['login_user']; ?>&type=<?php echo $_SESSION['type']; ?>&q3=<?php echo $login_session_1; ?>">
						<div class="menu-ele">
							Profile
						</div>
					</a>
					<a>
						<a href="database.php"><div class="menu-ele" onclick="">
							Database
                            </div></a>
					</a>
					<a>
						<a href="appointments.php"><div class="menu-ele" onclick="">
							Appointments
                            </div></a>
					</a>
					<a href="logout.php">
						<div class="menu-ele">
							Logout
						</div>
					</a>
				</div>
		    </div>
		</div>
		<div>
			<center>
			<?php
				echo '<h1>'.$type.'</h1>';
			?>
			<hr>
		    </center>
		</div>
		<div class="vl">
		</div>
		<div class="flexed">
			<div class="one">
					<center>
					   <h3>Doctor's List</h3>
				   	</center>
				   	<div class="page1">
					    <div class="tab" id="tab" style="float:right" onclick="openmodal('Add_Doc')">
					    </div>
				    </div>
			</div>
			<div class="two">
				<center>
				    <h3>Patient's List</h3>
			    </center>
			    <div class="page1">
				    <div class="tab" style="float:right" onclick="openmodal('Add_Pat')"></div>
				</div>
			</div>
		</div>
		<div class = "flexed">
		<div class="one">
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
							'<div class = "boxed">
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
		<div class="two">
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
							'<div class = "boxed">
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
	</div>
	<div class="modal" id="Add_Doc">
	<div class="modal-content">
		<div class="close" onclick="closemodal('Add_Doc')">&times;</div>
		<div class="modal-header">
			<h2>Add Doctor's Class</h2><br>
		</div>
		<div class="modal-body">
			<form method="post" action="addclass.php">
				<label for="classtype">Doctor's Class</label><br><br>
				<input type="text" name="classtype" style="width:100%"><br><br>
				<center><input type="submit" name="Add_Doc" value="Add" class="button"></center><br><br>
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
				<label for="classtype">Patient's Class</label><br><br>
				<input type="text" name="classtype" style="width:100%"><br><br>
				<center><input type="submit" name="Add_Pat" value="Add" class="button"></center><br><br>
			</form>
		</div>
	</div>
    </div>
	<div class="modal" id="Doc">
	<div class="modal-content" style="overflow-y: scroll">
		<div class="close" onclick="closemodal('Doc')">&times;</div>
		<div class="modal-header">
			<h2>Add Doctor</h2><br>
		</div>
		<div class="modal-body">
			<form method="post" action="invite.php">
				<label for="email">Doctor email</label><br><br>
				<input type="email" name="email" style="width:100%"><br><br>
				<label for="type">Type</label><br><br>
				<input type="text"  name="type" style="width:100%">
				<input type="hidden" name="doc" value="doctor">
				<center><input type="submit" name="Invite" value="Invite" class="button"></center><br><br>
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
				<label for="email">Patient email</label><br><br>
				<input type="email" name="email" style="width:100%"><br><br>
				<label for="type">Type</label><br><br>
				<input type="text"  name="type" style="width:100%">
				<input type="hidden" name="doc" value="patient">
				<center><input type="submit" name="Invite" value="Invite" class="button"></center><br><br>
			</form>
		</div>
	</div>
    </div>
</body>
</html>