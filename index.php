<?php
session_start();
 include'logout.php';

  $_SESSION['message'] = "";
$conn = mysqli_connect('localhost', 'root', '', 'cake');

if(isset($_POST['signup_user'])){
	$phone = $conn->real_escape_string($_POST['phone']);
	$email = $conn->real_escape_string($_POST['email']);
		$query1 = "SELECT phone FROM user WHERE phone='$phone'";
		$results = mysqli_query($conn, $query1);
		if (mysqli_num_rows($results) == 0) {
			
			
	$query2 = "SELECT email,phone FROM user WHERE email='$email'";
	$result = mysqli_query($conn, $query2);
	if (mysqli_num_rows($result) == 0){
	
	$email = $conn->real_escape_string($_POST['email']);
	$phone = $conn->real_escape_string($_POST['phone']);
	
	if(ctype_digit($phone)&&strlen($phone)==10){
				
					
		
	if($_POST['password'] == $_POST['cpassword']){
		
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$dob = $_POST['dob'];
		$password = md5($_POST['password']);
		
		$_SESSION['phone'] = $phone;
		$_SESSION['uname'] = $uname;
		$hash = rand(100000,999999); 
		
$query= "INSERT INTO user (uname, email, phone, dob, password, hash)
								VALUES('$uname', '$email', '$phone', '$dob', '$password','$hash')";
								$ress = mysqli_query($conn, $query);
								
								 if($conn->query($query) === true){
							
								
									 $to = $email;
   $subject= 'Signup|Verification';
   $msg='Thank you for signing up. Your one time validation code is :'.$hash.
   'Copy and Paste the same code on the verification page ' ;
 $headers='From:yumyumcakes@gmail.com'."\r\n";
 mail($to,$subject,$msg,$headers); 
 $query3 = "SELECT * FROM user WHERE email='$email'";
	$result = mysqli_query($conn, $query3);
	if (mysqli_num_rows($result) == 0){
	    $uid=trim($row["uid"]);
	$_SESSION['uid'] = $uid;
	 $adbit=trim($row["adbit"]);
	}
 	header('location: hash.php');
 	
								}
								else{
									$_SESSION['message'] = "User could not be added";
								} 
	}
	else{
		$_SESSION['message'] = "Two passwords do not match";
		header('location:signup.php');
	}
	}
	else{
		$_SESSION['message']="Phone number should be valid with 10 digits";
		header('location:signup.php');
	}
	
	
	}
	else{
		$_SESSION['message']="Email already exists";
		header('location:signup.php');
		
	}
	
		}
		else{
		$_SESSION['message']="Phone number already exists";
			header('location:signup.php');
		} 
}
?>

<!DOCTYPE html>
<head>
<title>YumYum Cakes</title>
<link rel="stylesheet" type="text/css"  href="demo5.css" />
<link rel="stylesheet" type="text/css"  href="gal.css" />
<link rel="stylesheet" type="text/css"  href="order.css" />

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 

 
 <script type="text/javascript"> 
  function locate(){	
  var geocoder;

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Please Enable your GPS or Internet");
}
}
  function initialize() {
    geocoder = new google.maps.Geocoder();



  }

  function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         //formatted address
        // alert(results[0].formatted_address)
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_2") {
                    //this is the object you are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        //city data
        
		document.getElementById('t').innerHTML = city.long_name;

        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
  
</script>

 
 
 
</head>
<body onload="initialize()">


<nav>

 <ul style="background-color:black; height:50px; border-bottom:4px solid #de0e0e;">
 
 
 <?php if(isset($_SESSION['uname'])){ ?>
  <a href="index.php?logout" > <li style="float:right"><form><button class="loginbtn" name="logout" style="background-color:#de0e0e">LOGOUT</button></form></li></a>
   
   <?php } else { ?>
  <li style="float:right"><form action="login.php"><button class="loginbtn" style="background-color:#de0e0e">LOGIN</button></form></li>
	 <li style="float:right"><a href="contact.php">CONTACT US</a></li>
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


<?php 
if(isset($_SESSION['adbit']) && $_SESSION['adbit']==0){
 
 ?>
<header class="header1">YumYum Cakes</header>





<article class="sliderarticle">
<div class="container">

<input type="radio" name="images" id="i1"> 
<input type="radio" name="images" id="i2"> 
<input type="radio" name="images" id="i3"> 

<div class="slide" id="one">
<img src="cakeone.jpg">

<label for="i3" class="pre"></label>
<label for="i2" class="nxt"></label>
</div>

<div class="slide" id="two">
<img src="cakeone.jpg">

<label for="i1" class="pre"></label>
<label for="i3" class="nxt"></label>
</div>

<div class="slide" id="three">
<img src="cakeone.jpg">

<label for="i2" class="pre"></label>
<label for="i1" class="nxt"></label>
</div>

<div class="nav">
<label class="dots" id="dot1" for="i1"></label>
<label class="dots" id="dot2" for="i2"></label>
<label class="dots" id="dot3" for="i3"></label>
</div>

</div>
</article>
<?php } else if(!isset($_SESSION['uid'])){ ?>
<header class="header1">YumYum Cakes</header>





<article class="sliderarticle">
<div class="container">

<input type="radio" name="images" id="i1"> 
<input type="radio" name="images" id="i2"> 
<input type="radio" name="images" id="i3"> 

<div class="slide" id="one">
<img src="cakeone.jpg">

<label for="i3" class="pre"></label>
<label for="i2" class="nxt"></label>
</div>

<div class="slide" id="two">
<img src="cakeone.jpg">

<label for="i1" class="pre"></label>
<label for="i3" class="nxt"></label>
</div>

<div class="slide" id="three">
<img src="cakeone.jpg">

<label for="i2" class="pre"></label>
<label for="i1" class="nxt"></label>
</div>

<div class="nav">
<label class="dots" id="dot1" for="i1"></label>
<label class="dots" id="dot2" for="i2"></label>
<label class="dots" id="dot3" for="i3"></label>
</div>

</div>
</article>

<?php 
}
if(isset($_SESSION['adbit']) && $_SESSION['adbit']==0){
 
 ?>
<article class="article2">
<input type="text" placeholder="Enter your location or Auto-detect" id="t" name="t">
<button class="material-icons" style="background-color:#87CAF0"  onclick="locate()">gps_fixed</button>
<button class="material-icons" style="background-color:#72FC62">check_circle</button>

</article>
<?php }  else if(!isset($_SESSION['uid'])){ ?>

<article class="article2">
<input type="text" placeholder="Enter your location or Auto-detect" id="t" name="t">
<button class="material-icons" style="background-color:#87CAF0"  onclick="locate()">gps_fixed</button>
<button class="material-icons" style="background-color:#72FC62">check_circle</button>
</article>
<?php } ?>


<article class="article1">



<?php if(isset($_SESSION['uname'])){ ?>
<h1>WELCOME&nbsp;<?php echo $_SESSION['uname']; 
if(isset($_SESSION['adbit']) && $_SESSION['adbit']==1){
            echo " (Admin)";
         ?>
		 <h2>ORDERS LIST</h2>
		<?php } ?>

</h1>
<?php }
else
{ ?>
	<h1>WELCOME&nbsp;GUEST </h1>
	
<?php

} ?>
<?php
$query="SELECT * FROM cakes";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
	while($row=$res->fetch_assoc()){
		$ck_img=trim($row["ck_img"]);
		$price=trim($row["price"]);
		$flavour=trim($row["flavour"]);
		$category=trim($row["category"]);
		$ckid=trim($row["ckid"]);
?>
<?php 
if(isset($_SESSION['adbit']) && $_SESSION['adbit']==0){
 
 ?>
 
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="cakedisplay?id=<?php echo $ckid; ?>">
      <img src="<?php echo $ck_img  ?>" alt="">
    </a>
	
    <div class="desc"><button class="button button5"><b><?php echo "₹ ", $price  ?></b></button><button class="button button1"><b>ADD TO <i class="material-icons">shopping_cart</i></b></button></div>

 </div>
</div>	
&nbsp;&nbsp;&nbsp;

<?php
}
else if(!isset($_SESSION['uid'])){ ?>
	
	<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="cakedisplay?id=<?php echo $ckid; ?>">
      <img src="<?php echo $ck_img  ?>" alt="">
    </a>
		<div class="desc"><button class="button button5"><b><?php echo "₹ ", $price  ?></b></button><button class="button button1" href="login.php"><b>ADD TO <i class="material-icons">shopping_cart</i></b></button></div>


		</div>
 
		</div>	

&nbsp;&nbsp;&nbsp;	
	<?php } ?>	
<?php
	
 } 
 }
  ?>

<?php 
if(isset($_SESSION['adbit']) && $_SESSION['adbit']==1){
 
 $query="SELECT * FROM orders WHERE obit=0";
 $results = mysqli_query($conn, $query);
 if (mysqli_num_rows($results) > 0) {
		
		while($row=$results->fetch_assoc()){
			$oid=trim($row["oid"]);
			$uid=trim($row["uid"]);
			$oname=trim($row["oname"]);
			$obit=trim($row["obit"]);
			
			$query1="SELECT * FROM user WHERE uid=$uid";
			$res=mysqli_query($conn, $query1);
			while($row=$res->fetch_assoc()){
				$uname=trim($row["uname"]);
				$dp=trim($row["dp"]);
			?>
			
			<div class="card">
<div class="cont">
<img src=<?php echo $dp ?> style="border-radius:50%; height:50px; width:50px">
<i><b><?php echo $oid ?></b></i>
<i style="color:red"><b><?php echo $uname ?></b></i>
<i><b><?php echo $oname ?></b></i>
<i style="float:right"><a href="deliver.php?oid=<?php echo $oid; ?>" >Deliverd</a></i>
</div>
</div>
		<?php	}
			
		}
 }
 ?>

 
<?php } ?>
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