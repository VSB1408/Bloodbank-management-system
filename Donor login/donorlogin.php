<?php
  session_start();
  require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Admin login/login.css">
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Log-In</title>
    <link rel="stylesheet" href="../css/home_style.css">
    <link rel="stylesheet" href="../Admin login/materialize.min.css">
    <link rel="stylesheet" href="../css/icon.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

    <style>
        body {
            background: url("../img/bg.jpg") no-repeat center center fixed;
            background-size: cover;
        }
    </style>

</head>

<body>

    <nav class="mynav">
        <div class="nav-wrapper container"><img class="brand-logo" src="../img/Logo.png" alt="Universe">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="btn transparent" href="../index.html">Home</a></li>
                <li><a class="btn transparent" href="../Find donor/finddonor.php">Find Donor</a></li>
                <!-- <li><a class="btn transparent" href="../Donor login/donorlogin.html">Donor Login</a></li> -->
                <li><a class="btn transparent" href="../Admin login/adminlogin.php">Admin Login</a></li>
                <li><a class="btn transparent" href="../Registration/register.php">Registration</a></li>
                <li><a class="btn transparent" href="https://pages.razorpay.com/pl_H2nqw1d2LV7hUI/view">Donate</a></li>
                <li><a class="btn transparent" href="../About us/about.html">About Us</a></li>
            </ul>
        </div>
    </nav>

    <form class="login" method="post" action="donorlogin.php">
        <input name="username" type="text" placeholder="username" required>
        <input name="password" type="password" placeholder="Password" required>
        <button name="login" type="submit">Log-In</button>
    </form>
    <?php
    if(isset($_POST['login']))
    {
        @$username=$_POST['username'];
        @$password=$_POST['password'];

        $query = "select * from user where username = '$username' and password = '$password' ";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            if(mysqli_num_rows($query_run)>0)
            {
                $row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
            
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;

                header('location: user.php');
            }
            else
            {
                echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
            }
        }
        else
        {
            echo '<script type="text/javascript">alert("Database Error")</script>';
        }
    }
    else
    {
    }
?>


</body>

</html>