<?php
   // include('config.php');
   $db=mysqli_connect("localhost","root","Anujay786","HealthQo");
   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
   session_start();

   $user_check = $_SESSION['login_user'];
   $type = $_SESSION['type'];
   // echo $type;
   // echo $user_check;
   if($type == 'Admin')
   {
     $sql = "select hosname,hosadd,name,email,password,mobile from HosAdm where email = '$user_check' ";
   }
   else if($type == 'Doctor')
   {
     $sql ="select did,hosname,name,email,password,mobile,type from HosDoc where email= '$user_check' ";
   }
   else if($type == 'Patient')
   {
      $sql = "select pid,hosname,name,email,password,mobile,type,status from HosPat where email= '$user_check' ";
   }
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result);

   $login_session_1 = $row['hosname'];
   $login_session_2 = $type;
   $login_session_3 = $row['name'];
   $login_session_4 = $row['mobile'];
   // $login_session_5 = $row['image'];

   if(!isset($_SESSION['login_user'])){
      header("location:signin.php");
   }
?>
