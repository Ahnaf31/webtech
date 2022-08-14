<!DOCTYPE html>
<html>
<head>

<script defer src="../js/login.js"></script>
    <title>Log in</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

House Management Company
<div align=right>
<?php include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/header.php';?>
</div>




 <form class="box" method="post" action="../controller/login_controller.php">
<h2>User Login Form</h2> 
<br>
  <label for="username" ></label>
  <input type="text" placeholder="Username" id="username" name="username" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="usernameErr"><?php if(!empty($_GET['userNameErr'])){echo $_GET['userNameErr'];}?></span> <br><br>
  
  <input type="password" placeholder="Password" id="password" name="password" onkeyup="change(this)" onblur="revert(this)">
  <span class="error" id="passErr"><?php if(!empty($_GET['passErr'])){echo $_GET['passErr'];}?></span>
  
  <input type="checkbox" id="reme" name="remember" value="remember">
  <label for="reme" style="color:white"> Remember Me</label><br>
  
  <input type="submit" id="submit" name="submit" value="Login">
  <a href="Forget_pass.php">Forgot Password?</a>
<br>
</form>



 <div align=center>
<?php include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/footer.php';?>
</div>

</body>
</html>