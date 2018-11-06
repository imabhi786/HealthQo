<?php
include('session.php');
include('config.php');

$email = $_GET["email"];
$category = $_GET["type"];
$hosname = $_GET["q3"];

if($category=='Admin')
	$sql = "SELECT * FROM hosadm where email = '$email' and hosname = '$hosname' ";
elseif ($category=='doctor')
	$sql = "SELECT * FROM hosdoc where email = '$email' and hosname = '$hosname' ";
elseif($category=='patient')
	$sql = "SELECT * FROM hospat where email = '$email' and hosname = '$hosname' ";

$result = mysqli_query($db,$sql);
$field = mysqli_fetch_assoc($result);

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Quicksand" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
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
			<a href="logout.php">
				<div class="menu-ele">
					Logout
				</div>
			</a>
		</div>
	</div>
    </div>
	<center><h1><?php echo $category ?></h1></center>
	<div class="flexed">
		<div class="one">
			<div>
			<div class = "image_holder">
				<div class="card">
					<img src="images/b1.jpg" height="280px" width="280px">
				</div>
			</div>
		</div>
		</div>
		
		<div class="two">
			<?php
				foreach($field as $column => $value)
				{
					if($column!='password')
					echo $column." :  ".$value.'<br>';
				}
			?>
		</div>
	</div>
</body>
</html>