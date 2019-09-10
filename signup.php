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

</head>
<body>
 
<div id="wrapper">

<div id="topnav">
<img id="logo" src="logo.jpg">
<h2>Sweet Cake</h2>
</div>

<article>
<h3 style="text-align:center">SIGN-UP</h3>

<div class="row">
    <form class="col s12" method="post" action="index.php">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="uname">
          <label for="icon_prefix">Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">mail</i>
          <input id="email" type="email" class="validate" name="email">
          <label for="email">E-mail</label>
        </div>
		<div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="icon_telephone" type="tel" class="validate" name="phone" minlength="10">
          <label for="icon_telephone">Phone number</label>
        </div>
		
		
		<div class="input-field col s6">
          <i class="material-icons prefix">cake</i>
          <input id="dob" type="date" name="dob">
          <label for="dob">Date of Birth</label>
        </div>
		
		
		
		<div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="pw" type="password" class="validate" name="password" minlength="6">
          <label for="pw">Password</label>
        </div><div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="cpw" type="password" class="validate" name="cpassword" minlength="6">
          <label for="cpw">Confirm Password</label>
        </div>
      </div>
	  <div style="text-align:center">
	  <button type="submit" class="btn" name="signup_user" style="width:400px">SIGN UP</button>
	  </div>
    </form>
  </div>
  <?php if(isset($_SESSION['message'])) {?>
  <p><?php echo $_SESSION['message']; } ?></p>
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