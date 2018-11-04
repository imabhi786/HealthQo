<?php
include('config.php');
if(isset($_POST['Add']))
{
	$classt = $_POST['classtype'];
	$sql = "INSERT into class(type) values('$classt')";
	if($db->query($sql))
	{
		header("location:main.php");
	}
	else
	{
		echo "Error :<br>".$db->error;
		echo "Entry Not Added Successfully !"; 
	}
}