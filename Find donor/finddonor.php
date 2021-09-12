<?php
session_start();
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="finddonor.css">
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find donor</title>
    <link rel="stylesheet" href="../css/home_style.css">
    <link rel="stylesheet" href="../Admin login/materialize.min.css">
    <link rel="stylesheet" href="../css/icon.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

</head>

<body>

    <nav class="mynav">
        <div class="nav-wrapper container"><img class="brand-logo" src="../img/Logo.png" alt="Universe">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="btn transparent" href="../index.html">Home</a></li>
                <!-- <li><a class="btn transparent" href="../Find donor/finddonor.html">Find Donor</a></li> -->
                <li><a class="btn transparent" href="../Donor login/donorlogin.php">Donor Login</a></li>
                <li><a class="btn transparent" href="../Admin login/adminlogin.php">Admin Login</a></li>
                <li><a class="btn transparent" href="../Registration/register.php">Registration</a></li>
                <li><a class="btn transparent" href="https://pages.razorpay.com/pl_H2nqw1d2LV7hUI/view">Donate</a></li>
                <li><a class="btn transparent" href="../About us/about.html">About Us</a></li>
            </ul>
        </div>
    </nav>

    <div class="header">
        <p style="margin-left: -590px;">Request Blood</p>
    </div>

    <form class="login" action="finddonor.php" method="POST" style="margin-left: -300px;">
        <input type="text" placeholder="Enter your Name" name="name" required>

        <select name="bt" id="question">
            <option selection disabled>Select your blood group:</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select> 
        
<div class="col s12 m8 l8">
				<label class="black-text" for="gender">Gender</label>
				<p class=" black-text">
					<label>
						<input class="with-gap black-text white" value="M" name="gender" type="radio" required />
						<span class="black-text">Male</span>
					</label>
					<label>
						<input class="with-gap black-text white" value="F" name="gender" type="radio" required />
						<span class="black-text">Female</span>
					</label>
					<label>
						<input class="with-gap black-text white" value="O" name="gender" type="radio" required />
						<span class="black-text">Other</span>
					</label>
				</p>
			</div>

        <!-- <input type="text" placeholder="Enter your  name" name="city" required> -->
        <input type="text" placeholder="Enter your Contact" name="contact" required>

        <button name="finddonor" type="submit" style="color: yellow;">Find Now</button>
    </form>
    <?php
    if(isset($_POST['finddonor']))
    {
        @$name=$_POST['name'];
        @$bt=$_POST['bt'];
        @$gender=$_POST['gender'];
        @$contact=$_POST['contact'];


        function get_random_string($size) {
            $size = intval($size);
            if ($size == 0) {
                return NULL;
            }
            $charSet = "0123456789ABCHEFGHJKMNPQRSTUVWXYZ";
            $len = strlen($charSet);
            $str = '';
            $i = 0;
            while (strlen($str) < $size) {
                $num = rand(0, ($len-1));
                $tmp = substr($charSet, $num, 1);
                $str = $str . $tmp;
                $i++;
            }
            return $str;
        }

        @$reqid = get_random_string(10);

        $_SESSION['reqid'] = $reqid;
        $_SESSION['name'] = $name;
        $_SESSION['bt'] = $bt;
        $_SESSION['gender'] = $gender;
        $_SESSION['contact'] = $contact;
        
        header('location: results.php');

    }
    ?>

</body>

</html>