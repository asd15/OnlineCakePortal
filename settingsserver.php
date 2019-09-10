<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cake');


if(isset($_POST["upload"])){

$target_dir = "profilepics/";
$target_file = $target_dir . basename($_FILES["dp"] ["name"]);

$tmp_file=$_FILES["dp"]["tmp_name"];

if(move_uploaded_file($_FILES["dp"]["tmp_name"],$target_file))
{
	$dp="profilepics/".$_FILES["dp"]["name"];
	$uname=$_SESSION['uname'];
	$query="UPDATE user SET dp='$dp' WHERE uname='$uname'";
	mysqli_query($conn,$query);
	if($query){
		header('location:settings.php');
	}
	
}

}

if(isset($_POST["update"])){
	$uname=$_POST["uname"];
	$dob=$_POST["dob"];
	$uid=$_SESSION['uid'];
	
	$query2="UPDATE user SET uname='$uname' dob='$dob' WHERE uid='$uid'";
	mysqli_query($conn,$query2);
	if($query2){
		
		echo $query2;
	}
}
?>
