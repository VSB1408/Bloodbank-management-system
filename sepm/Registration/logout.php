<?php

session_start();
unset($_POST) ; $_POST = array();
session_unset();

session_destroy();
header('Location: donorlogin.php');
exit;

?>