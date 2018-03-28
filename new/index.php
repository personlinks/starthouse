<?php
	require 'connections/connections.php';
?>

<?php

	if (isset($_POST['Signup'])) {
			
			session_start();
			$School = $_POST['School'];
			$Fname = $_POST['FirstName'];
			$Lname = $_POST['LastName'];
			$Email = $_POST['Email'];
			$Matricule = $_POST['Matricule'];
			$Password1 = $_POST['Password1'];
			$Password2 = $_POST['Password2'];

			$StorePassword = password_hash($Password2, PASSWORD_BCRYPT, array('cost' => 10));

			$sql = $con -> query("insert INTO register (First_Name, Last_Name, Email, School, Matricule, Password) VALUES ('{$Fname}', '{$Lname}', '{$Email}', '{$School}', '{$Matricule}', '{$StorePassword}')");

			header('Location: index.php');

		}	
?>

<?php
	
	if (isset($_POST['Login'])) {

		$Matricule = $_POST['Matricule'];
		$Password = $_POST['Password'];

		$result = $con -> query("select * FROM register WHERE Matricule = '$Matricule'");
		$row = $result->fetch_array(MYSQLI_BOTH);

		if(password_verify($Password, $row['Password'])){

			session_start();
			$_SESSION["ID"] = $row['ID'];

			header('Location: account.php');
		}

		else{
			session_start();
			$_SESSION["LogInFail"] = 'Yes';	
		}

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
				<h4>Log In or Create your Account!</h4>
			</p>
		</div>
		<div class="rightBody">
			<div class="Logger">
				<div class="form1">
					<form action="" method="post" name="form1" id="form1">
					<?php if(isset($_SESSION["LogInFailed"])){ ?>
    					<div class="FormElement"> LogIn Failed! Please Try Again.</div>
    				<?php } ?>
						<div class="FormElement">
							<h1>Sign In</h1>
						</div>
						<div class="FormElements">
							<input type="text" name="Matricule" class="TFields" required="required" id="Matricule" placeholder="matricule">
							<input type="password" name="Password" class="TFields" required="required" id="Password" placeholder="password">
							<input type="submit" name="Login" class="button" id="Login" value="login">
						</div>
					</form>
				</div>
				<div class="form2">
					<form action="" method="post" name="form2" id="form2">
						<div class="FormElement">
							<h1>Create Your Account</h1>
						</div>
						<div class="FormElement">
							<select class="TField" name="School" id="School" required="required" placeholder="---Select your school---">
								<option value="">---Select your school---</option>
								<option value="HTTC">HTTC</option>
								<option value="HTTTC">HTTTC</option>
								<option value="COLTECH">COLTECH</option>
								<option value="FHS">FHS</option>
								<option value="FS">FS</option>
								<option value="FA">FA</option>
								<option value="FEMS">FEMS</option>
								<option value="FLPS">FLPS</option>
								<option value="HICM">HICM</option>
								<option value="HITL">HITL</option>
							</select>				
						</div>
						<div class="FormElement">
							<input type="text" name="FirstName" id="FirstName" class="TField" required="required" placeholder="First Name">
						</div>
						<div class="FormElement">
							<input type="text" name="LastName" id="LastName" class="TField" required="required" placeholder="Last Name">
						</div>
						<div class="FormElement">
							<input type="email" name="Email" id="Email" class="TField" required="required" placeholder="Email">
						</div>
						
						<div class="FormElement">
							<input type="text" name="Matricule" id="Matricule" class="TField" required="required" placeholder="Matricule">
						</div>
						<div class="FormElement">
							<input type="password" name="Password1" id="Password1" class="TField" required="required" placeholder="Password">
						</div>
						<div class="FormElement">
							<input type="password" name="Password2" id="Password2" class="TField" required="required" placeholder="Re-enter password">
						</div>
						<div class="FormElement">
							<input type="submit" name="Signup" id="Signup" class="button" value="Create Account">
						</div>
					</form>
				</div>
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