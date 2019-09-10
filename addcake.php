<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'cake');
?>
<?php
$_SESSION["msg"]="";
?>
<!DOCTYPE html>
<head>
<title>YumYum Cakes</title>
<link rel="stylesheet" type="text/css"  href="demo5.css" />
<link rel="stylesheet" type="text/css"  href="gal.css" />
<link rel="stylesheet" type="text/css"  href="order.css" />

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 </head>
 <body>
 
 
<nav>

 <ul style="background-color:black; height:50px; border-bottom:4px solid #de0e0e;">
 
 
 <?php if(isset($_SESSION['uname'])){ ?>
  <a href="index.php?logout" > <li style="float:right"><form><button class="loginbtn" name="logout" style="background-color:#de0e0e">LOGOUT</button></form></li></a>
   
   <?php } else { ?>
  <li style="float:right"><form action="login.php"><button class="loginbtn" style="background-color:#de0e0e">LOGIN</button></form></li>

   <?php } ?>
   <li style="float:right"><a href="addcake.php">ADD A CAKE</a></li>

 	
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

<article class="article3">
<h1>Add Cake</h1>

<div style="text-align: center;">
<form action="addcakeserver.php" method="post" enctype="multipart/form-data">

<label>Cake Image: </label>
<input type="file" name="ckimg" id="ckimg" accept="image/*"><br><br>

<label>Price: </label>
         <input  type="text" class="validate" name="price"><br><br>
		 
		 <label>Flavour: </label>
         <input  type="text" class="validate" name="flavour"><br><br>
		 
		 <label>Category: </label>
         <input  type="text" class="validate" name="category"><br><br>


<input type="submit" value="ADD CAKE" name="addcake"></input>
<h3 style="color:green"><?php echo $_SESSION["msg"]; ?></h3>
</form>
<?php
$_SESSION["msg"]="";
?>
</div>
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