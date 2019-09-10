<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cake');
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



<article class="article1">
<h1>WEDDING&nbsp;CAKES</h1>


<?php
$query="SELECT * FROM cakes WHERE category='wedding'";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
	while($row=$res->fetch_assoc()){
		$ck_img=trim($row["ck_img"]);
		$price=trim($row["price"]);
		$flavour=trim($row["flavour"]);
		$category=trim($row["category"]);
		$ckid=trim($row["ckid"]);
	
?>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="cakediplay.php ?id=<?php echo $ckid; ?>">
      <img src="<?php echo $ck_img  ?>" alt="">
    </a>
    <div class="desc"><button class="button button5"><b><?php echo "₹ ", $price  ?></b></button><button class="button button1"><b>ADD TO <i class="material-icons">shopping_cart</i></b></button></div>
  </div>
</div>
	
&nbsp;&nbsp;	
<?php 
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
