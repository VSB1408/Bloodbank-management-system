<?php
session_start();
require_once('config.php');

$don = "select * from user where username = '".$_SESSION['username']."'  ";
$result = mysqli_query($con, $don);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>Profile</title>

	<link rel="stylesheet" type="text/css" href="user.css?b=<?php echo time();?>">


	<style type="text/css">
		h5{
			text-align: center;
			display: inline-block;
			margin-top: 12px;
			
			color: darkblue;
			letter-spacing: 1.2px;
			margin-left: 20px;

		}
		.formpin{
			margin-top: 16px; 
		}
	</style>
</head>

<body style="background-color: #85FFBD;
background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);
">
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">User Profile</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation mdl-layout--large-screen-only" action='user.php' method='POST'>

					<form action="user.php" method="POST"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="delete">DELETE ACCOUNT</button>
					</form>
					&emsp;&emsp;&emsp;&emsp;
					<a href="logout.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent logout" name="logout">LOGOUT</button></a>

				</nav>
			</div>
		</header>

		<div class="card-container">
			<div class="upper-container">
				<div class="image-container">
					<img src="img/profile.png" />
				</div>
			</div>

			<div class="lower-container">
				<div>
					<h3>Welcome <?php echo $row['name']; ?></h3>
					<h5><?php echo "User ID: ".$row['usid']."<br> Blood Type: ".$row['bg']; ?></h5> 
				</div>

				<div class="formpin">
					
					<form action="user.php" method="POST">
						<label for="question"><b>Would you like to donate Today?</b></label><br>
						<label for="locid"><b>Enter the Location Pincode</b></label><br>
						<input type="text" placeholder="Enter Pincode" name="locid" autocomplete="on" required>
						<br><br>
						<button name="donate" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit">DONATE</button>
					</form>
				</div>
			</div>
		</div>

		<?php

		@$usid = $row['usid'];
		@$name = $row['name'];
		@$bt = $row['bt'];
		@$qty = 1;

		@$today = date("Y-m-d");

		@$nd = $row['nextdate'];
		@$ndtt = strtotime($nd);
		@$nextdate = getDate($ndtt);

		function random_strings($length_of_string) 
		{ 
			$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
			return substr(str_shuffle($str_result), 0, $length_of_string); 
		}

		$donateid = random_strings(10);
		$bdonateid = random_strings(10);

		if(isset($_POST['donate']))
		{
			@$locid = $_POST['locid'];
			if ($today < $nextdate)
			{
				$qa = "insert into donor values('$usid', '$name', '$donateid', '$locid')";
				$qarun = mysqli_query($con,$qa);

				$qb = "insert into dlist values('$donateid', '$qty', '$bdonateid', '$locid')";
				$qbrun = mysqli_query($con,$qb);

				if($qarun){
					if($qbrun){
						echo '<script type="text/javascript">alert("Good Work! Your Donation request has been acknowledged.")</script>';

						unset($_POST) ; $_POST = array();
					}
				}
				else{
					echo '<script type="text/javascript">alert("Good Work! But, It seems we have run into small DB error! Contact Admin")</script>';

					
				}
			}
			else
			{
				echo '<script type="text/javascript">alert("Sorry You Cannot Donate Today! Your have not yet reached the next permissible Donation Date.")</script>';

				
			}
		}

		if(isset($_POST['delete']))
		{
			$del = "delete from user where usid = {$usid} ";
			$delrun = mysqli_query($con, $del);
			if($delrun)
			{
				echo '<script type="text/javascript">alert("Account Deleted. Logging Out.")</script>';
				header('Location: donorlogin.php');
			}

			session_destroy();
		}

		?>

	</body>
	</html>