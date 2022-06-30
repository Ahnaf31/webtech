<!DOCTYPE html>
<html>
<head>
    <title>Log in</title>

</head>
<body>
<fieldset>
HM Company
<div align=right>
<?php include 'include/header.php';?>
</div>
</fieldset>

<?php


$userErr = "" ;
$passErr ="";
$ret="";
$username = $pass = "";
$errCount = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{  
if (empty($_POST["username"]))
{
$userErr = "User Name is required";
$errCount = $errCount + 1;	
}
else
{
$username = $_POST["username"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username))
	{
      $nameErr = "Only letters and white space allowed";
	  $errCount = $errCount + 1;
    }

	if (strlen($username) <2 )
	{
		$nameErr = "Name must contains at least two words";
		$errCount = $errCount + 1;
	}
	
}


//pass validation
if (empty($_POST["pass"]))
{
  $passErr = "Password is required";
  $errCount = $errCount + 1;
}
else
{
  $pass = check_input($_POST["pass"]);
      if (isset($_POST['remember'])) {
                
                setcookie('username', $username, time() + 500);
                setcookie('password', $pass, time() + 500);
            }
	
}

/*
  if (strlen($_POST["pass"]) <= '8')
  {
     $passErr = "Password must not be less than 8 characters";
  }
  if (!preg_match('@[^\w]@', $pass))
  {
     $passErr = "Password must contain at least one of the special characters (@, #, $,%)";
  }
*/


//retrive data from json
    if ($errCount < 1)
	{

        $data = file_get_contents("Data.json");
        

        $array = json_decode($data);
        
        $user_found = false;
        foreach($array as $item) {
            if ($username === $item->username){
                $user_found = true;
               
              if ($pass === $item->password){
				  session_start();
               $_SESSION['username'] = $username;
				if (isset($_SESSION['username'])) {
					header('Location: Dashboard.php');
				}					
                }
				else
				{
                    $passErr = "You have entered a wrong password ! ";
                }
            }
        }
        if (!$user_found){
            $userErr = "No account found!";
        }

    }
	

}

  function check_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 ?>

 <fieldset>
<h2>Login Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  User Name: <input type="text" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; }?>">
  <span class="error">* <?php echo $userErr;?></span>
  <br><br>
  
   Password: <input type="text" name="pass" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; }?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  
<input id="remember" type="checkbox" name="remember" value="True">
<label for="remember">Remember Me</label>
<br>
 <input type="submit" value="Submit">
 <a href="Forget_pass.php">Forgot Password?</a>
<br>
</form>
</fieldset>


<fieldset>
 <div align=center>
<?php include 'include/footer.php';?>
</div>
</fieldset>
</body>
</html>