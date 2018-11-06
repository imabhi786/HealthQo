<?php
include('config.php');
if(isset($_POST['Add_Doc']))
{
	$classt = $_POST['classtype'];
	$sql = "INSERT into class_Doc(type) values('$classt')";
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
if(isset($_POST['Add_Pat']))
{
	$classt = $_POST['classtype'];
	$sql = "INSERT into class_Pat(type) values('$classt')";
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