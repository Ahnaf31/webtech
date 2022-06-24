<!DOCTYPE HTML>  
<html>
<body>  
<?php

$nameErr = $passErr ="" ;
$name = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{  
if (empty($_POST["name"]))
{
$nameErr = "Name is required";
}
else
{
$name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
	{
      $nameErr = "Only letters and white space allowed";
    }

 if (!preg_match('#^\w+\s\w+#', $name))
{
  $nameErr = "Name must contains at least two words";
}
}

if (empty($_POST["pass"]))
{
  $passErr = "Password is required";
}
else
{
  $pass = $_POST["pass"];

  if (strlen($_POST["pass"]) <= '8')
  {
     $passErr = "Password must not be less than 8 characters";
  }
  if (!preg_match('@[^\w]@', $pass))
  {
     $passErr = "Password must contain at least one of the special characters (@, #, $,%)";
  }
}

}



 ?>

<h1>Login Form</h1>
 <fieldset>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  
   Password: <input type="text" name="pass" value="<?php echo $pass;?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  
<input id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>> <label for="remember">Remember Me</label>

<a href="Forgot Password.php">Forgot Password?</a>
  
 </fieldset>
 <input type="submit" value="Submit">


</body>
</html>