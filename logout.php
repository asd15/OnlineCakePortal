<?php

$conn = mysqli_connect('localhost', 'root', '', 'cake');

if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['uname']);
	//unset($_SESSION['uid']);
  	header('location: index.php');
  }
?>