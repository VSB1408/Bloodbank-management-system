<?php
session_start();

require_once('config.php');

$don = "SELECT * from admin where username = '".$_SESSION['username']."' ";
$result = mysqli_query($con, $don);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>Profile</title>

  <style type="text/css">
    html {
      height: 100%;
    }
    body {
      height: 100%;
      margin: 0;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-color: #8EC5FC;
      background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
    }

    .header{
      padding: 10px;
      width: auto;
      background: rgba(73, 74, 158, 0.2);
      backdrop-filter: blur(200px);
      font-size: 50px;
      font-family: Cambria;
      color: #ffffff;
      text-align: center;
      text-shadow: 0px 4px 4px black;
      box-shadow: 0px 2px 2px #1c1836,
      0px 4px 4px #3c375e;
    }

    .container{
      width:90%;
      padding:12px;
      margin:20px auto;
      display:flex;
      flex-direction:row;
      justify-content:center;
      font-family: 'Roboto',sans-serif;
      font-weight:300;
    }
    .ucard{
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 10px 2px rgba(0,0,0,.2);
      margin: 28px;
      padding: 28px;
      width: 24%;
    }
    .ucard p
    {
      float: right;
      margin-top: 18px;
      margin-right: 20px;
      font-size: 20px;
      line-height: 24pt;
      font-family: Roboto;
    }
    .ucard li{
      list-style-type: none;
      font-size: 18px;
      line-height: 18pt;
    }

    .card-row {margin: 0 -5px;}

    .card-row:after {
      content: "";
      display: inline-block;
      clear: both;
    }

    .caption{
      background: rgba(135, 209, 113, 0.6);
      height: 120px;
      width: auto;
      padding: 8px;
      text-align: center;
      margin: 26px 0px 20px 0px;
      box-shadow: 0 2px 2px 1px rgba(0,0,0,.2);

    }
    .user table{

      background: #fff;
      border-radius: 12px;
      margin: 20px auto; 
      padding: 8px auto;
      border-spacing: 16px;
      border-collapse: separate;
      text-align: justify-all;
      box-shadow: 0 10px 10px 2px rgba(0,0,0,.2);
    }

    .deluser{
      text-align: center;
      margin: 20px auto; 
      padding: 8px auto;
      padding: 24px;
      background: #fff;
      margin-left: 280px;
      margin-right: 280px;
      border-radius: 12px;
      box-shadow: 0 10px 10px 2px rgba(0,0,0,.2);

    }

    .add{
      text-align: center;
      padding: 24px;
      background: #fff;
      margin-left: 280px;
      margin-right: 280px;
      border-radius: 12px;
      box-shadow: 0 10px 10px 2px rgba(0,0,0,.2);
    }

    input{
      background-color: #d9c180;
      background: #edd79a;
      border-radius: 2px;
      outline: none;
      width: 40%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;

    }

    button{
      border-radius: 2px;
      background-color: #3072db;
      color: #fff;
      text-align: center;
      padding: 10px;
      margin: 8px auto;
      border: none;
      cursor: pointer;
      width: auto;
      opacity: 1;
      box-shadow: 0 2px 2px .2px rgba(0,0,0,.2);
    }
  </style>
</head>

<body>

  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Admin Profile</span>
        <div class="mdl-layout-spacer"></div>
        <nav class="mdl-navigation mdl-layout--large-screen-only" action='admin.php' method='POST'>

          <form action="admin.php" method="POST"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="delete">DELETE ACCOUNT</button>
          </form>
          &emsp;&emsp;&emsp;&emsp;
          <a href="../index.html"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent logout" name="logout">LOGOUT</button></a>
        </nav>
      </div>
    </header>


    <div class="container">
      <div class="ucard">
        <img src="img/profile.png" alt="Neutral Profile Picture" style="border-radius: 50%; height: 60px; margin-right: 8px; margin-top: 18px; "><p><?php echo "Name: ".$row['name']."<br>Total Hours: ".$row['workh']."<br> Contact: ".$row['contact']; ?></p>
      </div>

      <div class="ucard">
        <h4>Available Activities</h4>
        <p>
          <li>View All Users</li>
          <li>View Stock</li>
          <li>View Transit Details</li>
          <li>Delete User</li>
          <li>Update Storage</li>
        </p>
      </div>
    </div>

    <div class="caption" >
      <p style="font-size: 36px; letter-spacing: 2px; margin: 24px auto 24px auto; padding: 22px;  text-align: center;">All User Details</p>
    </div>

    <div class="user">
      <table>
        <tr>
          <th>Usid</th><th>username</th><th>name</th><th>Gender</th><th>Blood Group</th><th>Rh Factor</th><th>Password</th><th>City</th>
        </tr>

        <?php

        $tq = "select * from user";
        $tqr = mysqli_query($con, $tq);

        while ($rowu = mysqli_fetch_assoc($tqr))
          { ?>
            <tr>
              <td><?php echo $rowu["usid"]; ?></td>
              <td><?php echo $rowu["username"]; ?></td>
              <td><?php echo $rowu["name"]; ?></td>
              <td><?php echo $rowu["gender"]; ?></td>
              <td><?php echo $rowu["bg"]; ?></td>
              <td><?php echo $rowu["password"]; ?></td>
              <td><?php echo $rowu["password"]; ?></td>
              <td><?php echo $rowu["city"]; ?></td>
            </tr>
            <?php 
          } 
          ?>
        </table>
      </div>

      <div class="caption" >
        <p style="font-size: 36px; letter-spacing: 2px; margin: 24px auto 24px auto; padding: 22px;  text-align: center;">Delete User Delete</p>
      </div>

      <div class="deluser">
        <form action="deleteuser.php" method="post">
          <label name = "us" for="delu"><b>Enter User ID for Deletion</b></label><br>
          <input type="text" placeholder="10 Character User ID" name="usid" required>
          <br>
          <button name = "delete" type="submit" class="delete">Delete User</button>
        </form>
  </div>

  <div class="caption" >
    <p style="font-size: 36px; letter-spacing: 2px; margin: 24px auto 24px auto; padding: 22px;  text-align: center;">Update Storage</p>
  </div>

  <div class="add">
    <form action="updatestorage.php" method="post">
      <label name = "stid" for="stid"><b>Enter Storage ID Blood Packets</b></label><br>
      <input type="text" placeholder="10 Character Storage ID" name="stid" required>
      <br>
      <label name = "donateid" for="donateid"><b>Enter Donation Details</b></label><br>
      <input type="text" placeholder="10 Character Donate ID" name="donateid" required>
      <br>
      <label name = "slocid" for="slocid"><b>Enter Storage Details</b></label><br>
      <input type="text" placeholder="Max 10 Character Storage Location ID" name="slocid" required>
      <br>
      <label name = "qty" for="qty"><b>Enter Blood Quantity</b></label><br>
      <input type="text" placeholder="Numerical Value ONLY" name="qty" required>
      <br>
      <label name = "bt" for="bt"><b>Enter Blood Group</b></label><br>
      <input type="text" placeholder="ONLY the Symbolic Blood Group" name="bt" required>
      <br>
      <button name = "update" type="submit" class="update">Update Storage Details</button>
    </form>
</div>
<div class="caption" >
  <p style="font-size: 36px; letter-spacing: 2px; margin: 24px auto 24px auto; padding: 22px;  text-align: center;">View Storage</p>
</div>

<div class="user">
  <table>
    <tr>
      <th>Storage ID</th><th>Donate ID</th><th>Location ID</th><th>Quantity</th><th>Blood Group</th>
    </tr>

    <?php

    $sq = "select * from storage";
    $sqr = mysqli_query($con, $sq);

    while ($rowsq = mysqli_fetch_assoc($sqr))
      { ?>
        <tr>
          <td><?php echo $rowsq["stid"]; ?></td>
          <td><?php echo $rowsq["donateid"]; ?></td>
          <td><?php echo $rowsq["slocid"]; ?></td>
          <td><?php echo $rowsq["qty"]; ?></td> 
          <td><?php echo $rowsq["bt"]; ?></td>
        </tr>
        <?php 
      } 
      ?>
    </table>
  </div>
</div>

</body>
</html>