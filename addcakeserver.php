<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cake');
if(isset($_POST['addcake'])){
$price=$_POST["price"];
$flavour=$_POST["flavour"];
$category=$_POST["category"];
$target_file = basename($_FILES["ckimg"] ["name"]);

$tmp_file=$_FILES["ckimg"]["tmp_name"];

if(move_uploaded_file($_FILES["ckimg"]["tmp_name"],$target_file))
{
	$ckimg=$_FILES["ckimg"]["name"];


$query="INSERT INTO cakes (ck_img, price, flavour, category)
	VALUES('$ckimg', '$price', '$flavour', '$category')";
	mysqli_query($conn,$query);
	if($query)
	{
		header('location:addcake.php');
		$_SESSION["msg"]="Cake added succesfully!";
	}
}
}

?>