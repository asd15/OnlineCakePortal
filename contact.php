<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cake');
?>

<!DOCTYPE html>
<head>
<title>YumYum Cakes</title>
<link rel="stylesheet" type="text/css"  href="demo5.css" />
<link rel="stylesheet" type="text/css"  href="gal.css" />

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
<h1>CONTACT US</h1>
<div>
 <div class="w3-card-4" style="width:48%; float:left">
    <img src="profilepics/akash.jpg" alt="Norway" style="width:100%; height:300px">
    <div class="w3-container w3-center">
      <p>Akash Desai<br>akashsdesai15@gmail.com<br>8379975025</p>
    </div>
  </div>
  &nbsp;
  <div class="w3-card-4" style="width:48%; float:right">
    <img src="profilepics/shivam.jpg" alt="Norway" style="width:100%; height:300px; transform: rotate(180deg)">
    <div class="w3-container w3-center">
      <p>Shivam Mishra<br>mishrashivam0028@gmail.com<br>9819351502</p>
    </div>
  </div>
</div>
  <br><hr><br>
  
  <h1>LOCATE US</h1>
  <div style="width: 100%">
  <iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=19.02156098474625, 72.83098697662355&amp;q=Navinchadra%20Mehta%20
  Institute%20of%20Technology%20and%20management+(YumYum%20Cakes)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0"
  marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Create Google Map</a>
  </iframe></div><br />
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
