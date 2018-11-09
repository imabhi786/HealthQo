<?php
include('session.php');
include('config.php');

$email = $_GET["email"];
$category = $_GET["type"];
$hosname = $_GET["q3"];

	$sql = "SELECT * FROM hospat where email = '$email' and hosname = '$hosname' ";

$result = mysqli_query($db,$sql);
$field = mysqli_fetch_assoc($result);

?>