<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cake');


?>

<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<title>Cake Portal</title>
<link rel="stylesheet" type="text/css"  href="style1.css" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

</head>
<body>
 
<div id="wrapper">

<div id="topnav">
<img id="logo" src="logo1.png">
<h2>YumYum Cakes</h2>
</div>
<article>
<h3 style="text-align:center">LOGIN</h3>

<div class="row">
    <form class="col s12" style="padding-left:190px; padding-right:190px" method="post" action="server.php">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" type="text" class="validate" name="email">
          <label for="email">E-mail</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="pw" type="password" class="validate" name="password">
          <label for="pw">Password</label>
        </div>
		<?php  ?>
      </div>
	  <div style="text-align:center">
<button type="submit" class="btn" name="login_user" style="width:400px">Login</button>
<h5>OR</h5>

</div>
    </form>
  </div>
  
 

<div style="text-align:center">
<a href="signup.php"><button type="submit" class="btn"  style="width:400px">Sign Up</button></a>
</div>
  
<h6 style="color:red"><?php echo $_SESSION['message'] ?></h6>

<?php $_SESSION['message']=""; ?>
</article>
<footer>
<section>
<a  href="#.html"><img id="pic" src="fb.jpg" alt=""></a>
<a  href="#.html"><img id="pic" src="twitter.jpg" alt=""></a>
<a  href="#.html"><img id="pic" src="you.png" alt=""></a>
</section>
<aside><h6>Copyright &copy Cake Portal, Dadar(W), Mumbai</h6></aside>


</footer>


</div>



</body>
</html>