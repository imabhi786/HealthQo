<?php
define('CSSPATH', 'css/');
$item = 'style.css'; 
$category = $_GET["category"];
$hosname = $_GET["name"];
$type = $_GET["type"];
include('config.php');
// include('session.php');
echo 
'<div class="header">
			<div>
				<h1>'.$hosname.'</h1>
		    </div>
 </div>';

if($category=='doctor')
{
	$sql = "select * from hosdoc where hosname ='$hosname' and type = '$type' ";
}
else
{
	$sql = "select * from hospat where hosname ='$hosname' and type = '$type' ";
}
	if($result = mysqli_query($db,$sql))
	{
		$rowcount = mysqli_num_rows($result);
		if($rowcount==0)
		{
			echo "<br><br>None Registered Yet!";
		}
		else
		{
			while($field = mysqli_fetch_assoc($result))
			{
				echo '<div class = "boxed1">';
				foreach($field as $column => $value) {
					if($column != 'password' && $column!='hosname')
					{	
						if($column=='email')
							$ans=$value;
				        echo '<div class="flexed">
								<div class="upper">'
				                   .$column . 
				                '</div>
				                <div class = "upper">'
				                   . $value.
				                '</div>
				               </div>';   
				    }
				}
				echo '<a href=profile.php?email='.$ans.'&type='.$category.'&q3='.$hosname.'>Profile</a>';
				echo '</div>';
			}
		}
	}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo (CSSPATH . "$item"); ?> ">
</head>
<body>

</body>
</html>