<?php
session_start();



$conn = mysqli_connect('localhost', 'root', '', 'cake');

if(isset($_POST['login_user' ])){
	
if (isset($_POST['email'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
if (isset($_POST['password'])) {
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
  $password=md5($password);
  
  $query="SELECT * from user WHERE email='$email' AND password='$password'";
  $results = mysqli_query($conn, $query);
	if (mysqli_num_rows($results) == 1) {
		
		while($row=$results->fetch_assoc()){
		  $bit=trim($row["adbit"]);
		  $_SESSION['adbit'] = $bit;
		  $active=trim($row["active"]);
		   $uid=trim($row["uid"]);
		  $_SESSION['uid'] = $uid;
		$uname=trim($row["uname"]);
		$_SESSION['uname'] = $uname;
	  } 
	  header('location:index.php');
	  
	}
	else{
		$_SESSION['message']= "Invalid email or password";
		header('location:login.php');
			 
	}
}
}
}
?>