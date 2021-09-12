<?php
require_once('config.php');

@$stid = $_POST['stid'];
@$donateid = $_POST['donateid'];
@$slocid = $_POST['slocid'];
@$qty = $_POST['qty'];
@$bt = $_POST['bt'];

$qs = "insert into storage values('$stid', '$donateid', '$slocid', '$qty', '$bt')";
$qsrun = mysqli_query($con, $qs);

if($qsrun)
{
  echo '<script type="text/javascript">alert("Storage Updated");</script>';
  header("Refresh:0");
  header("Location: admin.php");
}
else
{
  echo "Error Updating Storage: " . mysqli_error($con);
}
?>