<?php
	require 'connections/connections.php';
?>

<?php
	session_start();
	if(isset($_SESSION["ID"])){
	}
	else{
	header('Location: index.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Updated</title>
	<link href="CSS/Master.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="top-bar">
		<h3>Updated.com</h3>
	</div>
	<div class="Container">
		<div class="leftBody">
			<p>
				<h2>Welcome to Updated</h2>
				<h4>
					Welcome to Here.
					<br>User ID: <?php echo $_SESSION["ID"]; ?>
				</h4>
			</p>
		</div>
		<div class="rightBody">
			<div class="Logger">
				
			</div>
		</div>
		<div class="footer">
	        <div class="content">
                &copy;2018 All Rights Reserved | Designed by Thomas Person @  <a href="http://afkanerd.com" target="_blank" style="color:brown">Afkanerd</a>
	        </div>
	    </div>
	</div>

</body>
</html>