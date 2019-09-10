<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cake');


	$oid=$_GET['oid'];
	$query="UPDATE orders SET obit=1 WHERE oid='$oid'";
	$res=mysqli_query($conn,$query);
	header('location:index.php');


?>