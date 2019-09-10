<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cake');

$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
$paypalID = 'akashsdesai15-facilitator@gmail.com'; 

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
 
    

   <li style="float:right"><a href="contact.html">CONTACT US</a></li>
  
  <li style="float:right"><a href="about.html">REVIEWS</a></li>
  
  <li style="float:right"><a href="gallery.html">GALLERY</a></li>
  
  <li id="dropdown" style="float:right">
    <a id="dropbtn">CATEGORIES</a>
    <div id="dropdown-content">
      <a href="indian.html">Birthday</a>
      <a href="italian.html">Wedding</a>
      <a href="mexican.html">Valentine</a>
    </div>
  </li>
  
   <li style="float:right"><a href="index.html">HOME</a></li>
  
  
  
  <li style="float:right"><?php if(isset($_SESSION['uname'])){ ?>
  <p>WELCOME <?php echo $_SESSION['uname']; ?></p>
  <?php
  }
  ?>
  </li>
  
   
   </ul>

</nav>


<div id="wrapper">



<article class="article1">
<h1>CAKE&nbsp;DETAILS</h1>


<?php
$id=$_GET['id'];
$query="SELECT * FROM cakes WHERE ckid=$id";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)==1){
	while($row=$res->fetch_assoc()){
		$ck_img=trim($row["ck_img"]);
		$price=trim($row["price"]);
		$flavour=trim($row["flavour"]);
		$category=trim($row["category"]);
		$ckid=trim($row["ckid"]);
	
?>

<div class="responsive">
  <div class="gal2">
    <a target="_blank" href="cakediplay.php ?id=<?php echo $ckid; ?>">
      <img src="<?php echo $ck_img  ?>" alt="">
    </a>
    </div>
</div>
	
&nbsp;&nbsp;	
<?php 
	}
}
?>
<div style="float:right">
<h3>Flavour: <?php echo $flavour; ?></h3>
<h3>Cake Type: <?php echo $category; ?></h3>
<h3>Price: <b>₹ <?php echo $price; ?></b></h3>

<?php
		if(isset($_SESSION['uid'])){ ?>
		
		
<form action="success.php" method="post">
<?php	} 
		else{  ?>
		<form action="login.php">
		<?php	}  ?>
<input type="hidden" name="business" value="<?php echo $paypalID; ?>">

<input style="float:right; width:300px;" type="hidden" name="cmd" value="_xclick">

<input type="hidden" name="item_cat" value="<?php echo $row['category']; ?>">
<input type="hidden" name="item_flav" value="<?php echo $row['flavour']; ?>">
        <input type="hidden" name="item_number" value="<?php echo $row['ckid']; ?>">
        <input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
        <input type="hidden" name="currency_code" value="INR">
		
		
		<input type="hidden" name="cancel_return" value="cancel.php">
        <input type="hidden" name="return" value="success.php">
		
		
		 <input type="image" name="pay" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
		
	
        
</form>
<div>

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
