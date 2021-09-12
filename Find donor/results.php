<?php
session_start();
require_once('config.php');

$reqid = $_SESSION['reqid'];
$name = $_SESSION['name'];
$gender = $_SESSION['gender'];
$bt = $_SESSION['bt'];
$contact = $_SESSION['contact'];

?>

<!DOCTYPE html>
<html>
<head>
  <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/TweenLite.min.js'></script>
  <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/EasePack.min.js'></script>
  <link rel="stylesheet" href="animated-sticky-header.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/demo.js'></script>
  <link rel="stylesheet" href="header.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
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
      background: #0a800a;
      font-size: 50px;
      font-family: Cambria;
      color: #ffffff;
      text-align: center;
      text-shadow: 0px 4px 4px black;
      box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);    }

      .content{
        margin: 80px;
        align-items:center;
        background:#fff;
        border-radius:20px;
        width:auto;
        height:80px;
        padding:20px;
        box-shadow: 0 10px 10px 2px rgba(0,0,0,.2);
        font-family: 'Roboto',sans-serif;
        font-weight: 600;
        letter-spacing: 1.6px;
      }

      .content p{
        margin-top:-1px;
        text-align:center;
        font-family:;
        font-size:26px;
      }

      select {
        width: 40%;
        padding: 16px 20px;
        border: none;
        border-radius: 4px;
        background-color: #edd79a;
      }

      * {
        box-sizing: border-box;
      }
      .container{
        width:90%;
        margin: 8px auto -62px auto;
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
        width: 42%;
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
        height: 140px;
        width: auto;
        padding-top: 2px;
        padding-bottom: 2px;
        text-align: center;
        margin: 20px 0px 18px 0px;
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
      .contain {
        padding: 24px;
        background: #fff;
        margin-left: 280px;
        margin-right: 280px;
        border-radius: 12px;
        box-shadow: 0 10px 10px 2px rgba(0,0,0,.2);
      }

      input[type=text], input[type=password], input[type=email], input[type=date],input[type=number] {
        width: 40%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #edd79a;

      }

      input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=date]:focus,input[type=number]:focus {
        background-color: #d9c180;
        outline: none;
      }

      .request {
        background-color: #347aeb;
        text-align: center;
        padding: 10px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 10%;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
      }

      .request:hover {
        opacity: 1;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
      }
    </style>
    <title>Result</title>
  </head>
  <body>

    <div class="header">
      <p>Request Blood</p>
    </div>

    <div class="container">
      <div class="ucard">
        <img src="img/profile.png" alt="Neutral Profile Picture" style="border-radius: 50%; height: 120px; margin-right: 2px; margin-top: 18px;">
        <p>
          <?php echo "Requestor ID: ".$reqid."<br>Name: ".$name."<br>Gender: ".$gender."<br> Contact: ".$contact."<br>Blood Group: ".$bt; ?>          
        </p>
      </div></div>

      <div class="content">
        <p>Available Blood & Donor Info</p></div>

        <div class="caption" >
          <p style="font-size: 36px; letter-spacing: 2px; margin: 24px auto 24px auto; padding: 22px;  text-align: center;">Available Donor</p>
        </div>

        <div class="user">
          <table>
            <tr>
              <th>Donor Name</th> <th>Gender</th><th>Blood Group</th><th>Contact</th>
            </tr>

            <?php

            $tq = "select * from user where bg = '".$bt."' ";
            $tqr = mysqli_query($con, $tq);
            $i = 1;
            while (($tqr))
              { $i = $i+1;
                $rowu = mysqli_fetch_assoc($tqr);

                ?>
                <tr>

                  <td><?php echo $rowu["name"]; ?></td>
                  <td><?php echo $rowu["gender"]; ?></td>
                  <td><?php echo $rowu["bg"]; ?></td>
                  <td><?php echo $rowu["contact"]; ?></td>
                  
                  
                </tr>
                <?php 
                if($i>=4) break;
              } 
              ?>
            </table>
          </div><br><br>

          <div class="caption" >
            <p style="font-size: 36px; letter-spacing: 2px; margin: 24px auto 24px auto; padding: 22px;  text-align: center;">Available Blood in Storage</p>
          </div>

          <div class="user">
            <table>
              <tr>
                <th>Storage ID</th><th>Location ID</th><th>Blood Group</th><th>Quantity</th>
              </tr>

              <?php

              $sq = "select * from storage where bt = '".$bt."' ";
              $sqr = mysqli_query($con, $sq);

              while ($rows = mysqli_fetch_assoc($sqr))
                { ?>
                  <tr>

                    <td><?php echo $rows["stid"]; ?></td>
                    <td><?php echo $rows["slocid"]; ?></td>
                    <td><?php echo $rows["bt"]; ?></td>
                    <td><?php echo $rows["qty"]; ?></td>
                  </tr>
                  <?php 
                } 
                ?>
              </table>
            </div><br><br>

            <div class="caption" >
              <p style="font-size: 36px; letter-spacing: 2px; margin: 24px auto 24px auto; padding: 22px;  text-align: center;">Place a Request</p>
            </div>


            <div class="contain">
              <center>
                <form action="results.php" method="POST">
                  <label for="dline"><b>Enter Date Of Requirement</b></label><br>
                  <input type="text" placeholder="(YYYY-MM-DD)" name="dline" autocomplete="on" required>
                  <br>
                  <label for="reqtype"><b>Enter Required Storage ID OR Donor Contact</b></label><br>
                  <input type="text" placeholder="Storage ID or Donor Contact" name="reqtype" autocomplete="on" required>
                  <br>
                  <label for="locid"><b>Enter Your Location ID</b></label><br>
                  <input type="text" placeholder="Location ID / Zipcode" name="locid" autocomplete="on" required>
                  <br>
                  <label for="qty"><b>Enter Required Quantity</b></label><br>
                  <input type="text" placeholder="Numerical Value Only" name="qty" autocomplete="on" required>
                  <br>
                  <button name = "request" type="submit" class="request">Request</button>
                </form>
              </center>

              <?php
              if(isset($_POST['request']))
              {
                @$dline=$_POST['dline'];
                @$reqtype=$_POST['reqtype'];
                @$locid=$_POST['locid'];
                @$qty=$_POST['qty'];

                $usidq = "select * from user where contact = '".$contact."' ";
                $usidres = mysqli_query($con, $usidq);
                $usidrow = mysqli_fetch_assoc($usidres);
                @$usid = $usidrow['usid']; 

                if(!($usid))
                {
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

                  @$usid = get_random_string(10);
                }
              
                if(is_numeric($reqtype))
                {
                  $rdq = "insert into acceptor values('$usid', '$name','$reqid', '$locid')";
                  $rdqrun = mysqli_query($con, $rdq);

                  $dusidqu = "select usid from user where contact = '".$reqtype."' ";
                  $dusidqres = mysqli_query($con, $dusidqu);
                  $dusidqrow = mysqli_fetch_assoc($dusidqres);
                  $dusidq = $dusidqrow['usid'];


                  if($dusidqres)
                  {
                    $rwdq = "insert into wlist values('$reqid', '$qty','$dusidq', '$dline')";
                    $rwdqrun = mysqli_query($con, $rwdq);

                    if($rwdqrun)
                    {
                      echo '<script type="text/javascript">alert("You Request has been Logged. You will receive further delivery info through Contact mode.")</script>';
                    }
                    else
                    {
                      echo '<script type="text/javascript">alert("Sorry! Request Could Not be logged. RWDQERR!")</script>';
                    }                                     
                  }
                  else
                  {
                    echo '<script type="text/javascript">alert("Could not Fetch Donor user ID from User!")</script>';
                  }
                }
                else
                {
                  $rdq = "insert into acceptor values('$usid', '$name','$reqid', '$locid')";
                  $rdqrun = mysqli_query($con, $rdq);

                  $rwdq = "insert into wlist values('$reqid', '$qty','$reqtype', '$dline')";
                  $rwdqrun = mysqli_query($con, $rwdq);

                if($rdqrun)
                {
                  echo '<script type="text/javascript">alert("You Request has been Logged. You will receive further delivery info through Contact mode.")</script>';
                }
                else
                {
                  echo '<script type="text/javascript">alert("Sorry! Request Could Not be logged. RDQERR!")</script>';
                }
              }
            }
            ?>
          </div>
        </body>
        </html>
