<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cake');

?>

<!DOCTYPE html>
<head>
<title>YumYum Cakes</title>
<link rel="stylesheet" type="text/css"  href="demo5.css" />
<link rel="stylesheet" type="text/css"  href="review.css" />


<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <style type="text/css">
  [type=radio]{
	  position:absolute;
	  opacity:0;
	  width:0;
	  height:0;
  }
  [type=radio] + i{
	  cursor:pointer;
  }
  [type=radio]:checked + i{
	  outline:1px solid #f00;
  }
  
  </style>
 </head>

<nav>

 <ul style="background-color:black; height:50px; border-bottom:4px solid #de0e0e;">
 
 
 <?php if(isset($_SESSION['uname'])){ ?>
  <a href="index.php?logout" > <li style="float:right"><form><button class="loginbtn" name="logout" style="background-color:#de0e0e">LOGOUT</button></form></li></a>
   
   <?php } else { ?>
  <li style="float:right"><form action="login.php"><button class="loginbtn" style="background-color:#de0e0e">LOGIN</button></form></li>

   <?php } ?>
 
    
 
 <?php
 if(isset($_SESSION['adbit']) && $_SESSION['adbit']==0){ 
  ?> 
   <li style="float:right"><a href="contact.php">CONTACT US</a></li>
   
   <?php if(isset($_SESSION['uname'])){ ?>
   <li style="float:right"><a href="settings.php">SETTINGS</a></li>
   <?php } ?>
  <li style="float:right"><a href="review.php">REVIEWS</a></li>
  
  
  <li id="dropdown" style="float:right">
    <a id="dropbtn">CATEGORIES</a>
    <div id="dropdown-content">
      <a href="birthday.php">Birthday</a>
      <a href="wedding.php">Wedding</a>
      <a href="valentine.php">Valentine</a>
    </div>
  </li>
 <?php } ?>
 
 <?php 
 if(isset($_SESSION['adbit']) && $_SESSION['adbit']==1){
	?> 
	<li style="float:right"><a href="addcake.php">ADD A CAKE</a></li>

 <?php } ?>	
  <?php if(isset($_SESSION['uid'])){ 
  $uid=$_SESSION['uid'];
  $query="SELECT dp FROM user WHERE uid=$uid";
  $res=mysqli_query($conn, $query);
  if (mysqli_num_rows($res) == 1) {
		
		while($row=$res->fetch_assoc()){
			$dp=trim($row["dp"]);
		}
  }
  }
  ?>
  
   <li style="float:right"><a href="index.php">HOME</a></li>
  
  
  <li style="float:right"><?php if(isset($_SESSION['uname'])){ ?>

  <img src="<?php echo $dp ; ?>" style="border-radius: 50%; height:40px; width:40px">
  <?php
  }
  ?>
  </li>
  
   
   </ul>

</nav>
<div id="wrapper">
<article class="article3" >
<?php if(isset($_SESSION['uname'])){ ?>
<div style="text-align: center;">
<h1>HOW LIKELY DO YOU LIKE OUR SERVICE?</h1>
<form method="POST" action="#">
<label>
<input type="radio" name="rating" value="verysad">
<i class="large material-icons verysad">sentiment_very_dissatisfied</i>
</label>

<label>
<input type="radio" name="rating" value="sad">
<i class="large material-icons sad">sentiment_dissatisfied</i>
</label>

<label>
<input type="radio" name="rating" value="neutral">
<i class="large material-icons neutral">sentiment_neutral</i>
</label>

<label>
<input type="radio" name="rating" value="happy">
<i class="large material-icons happy1">sentiment_satisfied</i>
</label>

<label>
<input type="radio" name="rating" value="veryhappy" checked>
<i class="large material-icons happy">sentiment_very_satisfied</i>
</label>


<br><textarea rows="10" cols="69" name="review" placeholder="Write something about us...(optional)"></textarea><br><br>

<input type="submit" name="submit" value="SUBMIT"></input>
</form>
</div>


<?php
}
$thanks="";
if(isset($_POST['review'])){
	$uid=$_SESSION["uid"];
	$rating=$_POST["rating"];
	$review=$_POST["review"];
	$query="INSERT INTO reviews (uid, rating, review)
								VALUES('$uid', '$rating', '$review')";
								$res=mysqli_query($conn, $query);
								if($query){
									$thanks="Thank you for your review. This will help us make better... :)";
								}
								
}
?>

<h1><?php echo $thanks ?></h1>
<hr>
<h2>Reviews By our Users</h2><br>

<?php
$query="SELECT * FROM reviews";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
	while($row=$res->fetch_assoc()){
		$review=trim($row["review"]);
		$uid=trim($row["uid"]);
		
		$query2="SELECT uname,dp FROM user WHERE uid=$uid";
		$res2=mysqli_query($conn,$query2);
		if(mysqli_num_rows($res2)>0){
		while($row=$res2->fetch_assoc()){
			$uname=trim($row["uname"]);
			$dp=trim($row["dp"]);
	
	?>
	
	<div class="w3-container" style="align:center;">

  <div class="w3-card-4" style="width:100%">
    <header class="w3-container w3-light-grey">
      <h3><?php echo $uname;  ?></h3>
    </header>
    <div class="w3-container">
     
      <img src="<?php echo $dp; ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
      <p><?php echo $review; ?></p><br>
    </div>
    
  </div>
</div>
	
	
	<?php	 
		}
	}
	}
}
?>



</article>





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