<!DOCTYPE HTML>  
<html>
<body>  
<?php
// Initialize variables
$cpass = $npass =$rpass = "";
$npassErr = $cpassErr =$rpassErr ="" ;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{  
if (empty($_POST["cpass"]))
{
$cpassErr = "Please enter current password";
}
else
{
$cpass = $_POST["cpass"];
}

if (empty($_POST["npass"]))
{
$npassErr = "Please enter a New Password";
}
else
{
	$npass = $_POST["npass"];
if($cpass == $npass)
{
	$npassErr = "Do Not Use Same Password";
}
if (strlen($_POST["npass"]) <= '8')
  {
     $npassErr = "Password must not be less than 8 characters";
  }
  if (!preg_match('@[^\w]@', $npass))
  {
     $npassErr = "Password must contain at least one of the special characters (@, #, $,%)";
  }

}

if (empty($_POST["rpass"]))
{
$rpassErr = "Please Retype New Password";
}
else
{
	$rpass = $_POST["rpass"];
	if($npass != $rpass)
{
	$rpassErr = "Retyped password did not match with new password";
}
}

}

 ?>
<h1>Change Password</h1>
 <fieldset>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Current Password: <input type="text" name="cpass" value="<?php echo $cpass;?>">
  <span class="error">* <?php echo $cpassErr;?></span>
  <br><br>
  
   New Password: <input type="text" name="npass" value="<?php echo $npass;?>">
  <span class="error">* <?php echo $npassErr;?></span>
  <br><br>

  Retype New Password: <input type="text" name="rpass" value="<?php echo $rpass;?>">
  <span class="error">* <?php echo $rpassErr;?></span>
  <br><br>

 </fieldset>
 <input type="submit" value="Submit">


</body>
</html>