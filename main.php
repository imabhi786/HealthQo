<?php
   include('session.php');
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Quicksand" rel="stylesheet">
</head>
<body>
	<div class="one">
		<?php
		echo $login_session_1.'<br>'. $login_session_2.'<br>'.$login_session_3.'<br>'.$login_session_4;
		?>

	</div>
	 <h2><a href = "logout.php" >Sign Out</a></h2>	
</body>
</html>