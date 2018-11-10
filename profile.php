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
    <script type="text/javascript" src="js1/script.js"></script>
    <link rel="stylesheet" href="css1/style.css">
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
                    if($category=='Patient' && $column=='pid')
                    $patid=$value;
                    if($category=='Patient' && $column=='type')
                    $pattype=$value;
                    if($category=='Patient' && $column=='status')
                    $patstat=$value;
                    if($category=='Doctor' && $column=='did')
                    $docid=$value;
				}
        if($category=='Patient' && $patstat=='false'){
            $sqlp="SELECT * FROM hosdoc where type = '$pattype'";
            $resultp = mysqli_query($db,$sqlp);
            echo "<h2>Doctors list</h2>";
            if ($resultp->num_rows > 0) {
                // output data of each row
                echo '<form method="post" action="">';
                while($row = $resultp->fetch_assoc()) {
                    echo '<input type="radio" name="rdoc" value="'.$row["did"].'"> ID : '.$row["did"].' / Name : '.$row["name"].'<br>';
                }
                echo '<input type="submit" name="submit"></form>';
            } else {
                echo "No doctors available";
            }
            if (isset($_POST['rdoc'])) {
                echo "<meta http-equiv='refresh' content='0'>";
            $sql1='INSERT INTO appointments VALUES ('.$patid.','.$_POST['rdoc'].')';
            $sql2='UPDATE HosPat SET status="true" WHERE pid='.$patid;
            mysqli_query($db,$sql2);
            mysqli_query($db,$sql1);
        }

        } elseif($category=='Patient' && $patstat=='true'){
            echo "<h2>Appointment</h2><h3>Doctor Details</h3>";
            $sql1 = "SELECT * FROM hosdoc WHERE did IN (SELECT did FROM appointments where pid = '$patid')";
            $result = mysqli_query($db,$sql1);
            $field = mysqli_fetch_assoc($result);
            foreach($field as $column => $value)
				{
					if($column!='password')
					echo $column." :  ".$value.'<br>';
				}
        } elseif($category=='Doctor'){
            $sqld="SELECT * FROM hospat where pid IN (SELECT pid FROM appointments WHERE did=".$docid.")";
            $resultp = mysqli_query($db,$sqld);
            echo "<h2>Patients to visit</h2>";
            if ($resultp->num_rows > 0) {
                // output data of each row
                 echo '<form method="post" action="">';
                while($row = $resultp->fetch_assoc()) {
                    echo '<input type="radio" name="rpat" value="'.$row["pid"].'"> ID : '.$row["pid"].' / Name : '.$row["name"].'<br>';
                }
                echo '<input type="submit" name="submit" value="Visited"></form>';
            } else {
                echo "No patients";
            }
            if (isset($_POST['rpat'])) {
                echo "<meta http-equiv='refresh' content='0'>";
            $sql1='DELETE FROM HosPat WHERE pid='.$_POST["rpat"];
            $sql2='DELETE FROM appointments WHERE pid='.$_POST["rpat"];
            mysqli_query($db,$sql2);
            mysqli_query($db,$sql1);
        }
        }
			?>
		</div>
	</div>
</body>
</html>
