<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cake');
$message="";
?>
<!DOCTYPE html>
<head>
<title>YumYum Cakes</title>
<link rel="stylesheet" type="text/css"  href="demo5.css" />
<link rel="stylesheet" type="text/css"  href="gal.css" />

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<nav>

 <ul style="background-color:black; height:50px; border-bottom:4px solid #de0e0e;">
</ul>

</nav>


<div id="wrapper">



<article class="article3">
<h1>Email Verification</h1>
<h3>To verify your account please enter the verification code provided in your email address.</h3><br><br>
<div style="text-align: center;">
<form method="POST" action="#">
<label>Enter Verification code here: </label>
         <input  type="text" class="validate" name="code"><br><br>

<input type="submit" name="verify" value="verify">
</form>
<h3><?php echo $message; ?></h3>
</div>

</article>
<?php 
 $uid = $_SESSION['uid']; 
 if(isset($_POST['verify'])){
	 $hash1=$_POST['code'];
	 
	 $query="SELECT hash from user where uid='$uid'";
$results = mysqli_query($conn, $query);
	if (mysqli_num_rows($results) == 1) {
  	 
	  while($row=$results->fetch_assoc()){
		 $hash=trim($row["hash"]);
		  
	  }
	
	
	if($hash==$hash1){
	    $query = "UPDATE user SET active=1";
				mysqli_query($conn,$query);
				
				$query1 = "SELECT * FROM user WHERE uid='$uid";
  	$results = mysqli_query($conn, $query1);
  	if (mysqli_num_rows($results) == 1) {
  	 
	  while($row=$results->fetch_assoc()){
		  $uid=trim($row["uid"]);
		  $_SESSION['uid'] = $uid;
		$uname=trim($row["uname"]);
		$_SESSION['uname'] = $uname;
	  }
 
 if($query1){
					header('location:index.php');
					exit;	
				
	}
	else{
			 $message= 'Invalid hash code!! Account could not be verified';
			 exit;
		}
  
}}
	}
 }


?>

<footer>
<section>
<a  href="#.html"><img id="pic" src="fb.jpg" alt=""></a>
<a  href="#.html"><img id="pic" src="twitter.jpg" alt=""></a>
<a  href="#.html"><img id="pic" src="you.png" alt=""></a>
</section>
<aside><h3>Copyright &copy Cake Portal, Dadar(W), Mumbai</h3></aside>


</footer>


</div>


</body>

 
</html>
