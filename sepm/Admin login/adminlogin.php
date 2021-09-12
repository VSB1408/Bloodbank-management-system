<?php
session_start();
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log-In</title>
    <link rel="stylesheet" href="../css/home_style.css">
    <link rel="stylesheet" href="./materialize.min.css">
    <link rel="stylesheet" href="../css/icon.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

    <style>
        html {
            height: 100%;
        }

        body {
            height: 100%;
            margin: 0;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-image: url(../img/admin.jpg);
            z-index: 1;
        }

        .header {
            padding: 10px;
            width: auto;
            color: #ffffff;
            z-index: 2;
            box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);

        }

        .header p {
            text-align: center;
            text-shadow: 0px 4px 4px black;
            font-size: 50px;
            font-family: Cambria;
            z-index: 3;

        }
    </style>

</head>

<body>
    <nav class="mynav">
        <div class="nav-wrapper container"><img class="brand-logo" src="../img/Logo.png" alt="Universe">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="btn transparent" href="../index.html">Home</a></li>
                <li><a class="btn transparent" href="../Find donor/finddonor.html">Find Donor</a></li>
                <li><a class="btn transparent" href="../Donor login/donorlogin.html">Donor Login</a></li>
                <li><a class="btn transparent" href="../Admin login/adminlogin.html">Admin Login</a></li>
                <li><a class="btn transparent" href="../Registration/register.html">Registration</a></li>
                <li><a class="btn transparent" href="https://pages.razorpay.com/pl_H2nqw1d2LV7hUI/view">Donate</a></li>
                <li><a class="btn transparent" href="../About us/about.html">About Us</a></li>
            </ul>
        </div>
    </nav>
    <div class="header">
        <p>Admin Login</p>
    </div>

    <div class="con">
        <form class="login">
            <input name="contact" type="text" placeholder="Admin Username" required>
            <input name="password" type="password" placeholder="Admin Password" required>
            <button name="login" type="submit">Log-In</button>
        </form>

        <?php
        if(isset($_POST['login']))
        {
            @$contact=$_POST['Username'];
            @$password=$_POST['password'];

            $query = "select * from admin where Username = '$Username' and password = '$password' ";
            $query_run = mysqli_query($con,$query);

            if($query_run)
            {
                if(mysqli_num_rows($query_run)>0)
                {
                    $row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);

                    $_SESSION['Username'] = $Username;
                    $_SESSION['password'] = $password;

                    header('location: admin.php');
                }
                else
                {
                    echo '<script type="text/javascript">alert("No such admin exists. Invalid Credentials")</script>';
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
    </div>
</body>

</html>