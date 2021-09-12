<?php
require_once('config.php');

$sql = "DELETE FROM user WHERE usid = '" . $_POST["usid"] . "'";

if (mysqli_query($con, $sql))
{
	echo '<script type="text/javascript">alert("Account Deleted")</script>';
	header("Refresh:0");
	header("Location: admin.php");
}
else
{
	echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);

?>