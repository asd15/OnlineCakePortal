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
<article class="article3">
<h1>Profile Settings</h1>
<div style="text-align: center;">
<img src="<?php echo $dp; ?>" class="circle"></img><br>

<form action="settingsserver.php" method="post" enctype="multipart/form-data">

<input type="file" name="dp" id="dp" accept="image/*">
<input type="submit" value="Update your profile picture" name="upload"></input>
</form>
<hr>
<br>
<table align="center">




    <form class="col s12" method="post" action="settingsserver.php">
	<tr>
	<td>
	<label>Name</label>
         <input  type="text" class="validate" name="uname"><br><br>
         
		
		</td>
       <td align="right">  
	   <label for="dob">Date of Birth</label>
          <input id="dob" type="date" name="dob"><br><br>
	  
	   
	   </td>
</tr>	   
		</table>
      </div>
	  <div style="text-align:center">
	  <button type="submit" class="btn" name="update" style="width:300px">UPDATE</button>
	  </div>
    </form>


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
