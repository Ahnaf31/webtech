<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>

</head>
<body>
<?php
$nameErr = $unameErr = $emailErr = $passErr =$cnpassErr = $genderErr = $dobErr = "" ;
$name = $uname = $email =$pass =$cnpass =$gender = $dob = $message =$error= "";
$errCount = 0;  
 $message = '';
 $error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{  //name validation
		if (empty($_POST["name"])) 
	{ 
		$nameErr = "Name is required";
		$errCount = $errCount + 1;
	} 
	else 
	{ 
		$name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
	{
      $nameErr = "Only letters and white space allowed";
	  $errCount = $errCount + 1;
    }
	else if (!preg_match('#^\w+\s\w+#', $name))
	{
		$nameErr = "Name must contains at least two words";
		$errCount = $errCount + 1;
	}
	}
   if (empty($_POST["email"])) 
    {
		$emailErr = "Email is required";
		$errCount = $errCount + 1;
	} 
	else 
	{
    $email = $_POST["email"];
	
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
      $emailErr = "Invalid email format";
	  $email="";
	  $errCount = $errCount + 1;
    }
	}
	//user name validation
	if (empty($_POST["uname"])) 
	{ 
		$unameErr = "User Name is required";
		$errCount = $errCount + 1;
	} 
	else 
	{ 
		$uname = $_POST["uname"];
		if (strlen($uname) <2 ) 
		{
        
          $userErr = "Minimum 2 characters required";
          $errCount = $errCount + 1;    
		}
         if (!preg_match("/^[a-zA-Z_\-.]*$/", $uname)) 
		{
          $unameErr = "Only letters, period, dash and underscore are allowed";
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
		$pass = $_POST["pass"];

	if (strlen($_POST["pass"]) <= '8')
	{
		$passErr = "Password must not be less than 8 characters";
		$errCount = $errCount + 1;
	}
	if (!preg_match('@[^\w]@', $pass))
	{
		$passErr = "Password must contain at least one of the special characters (@, #, $,%)";
		$errCount = $errCount + 1;
	}
	}
	//confirm pass validation
	if (empty($_POST["cnpass"]))
	{
	$cnassErr = "Please Confirm Password";
	$errCount = $errCount + 1;
	}
	else
	{
		$cnpass = $_POST["cnpass"];
		if($pass != $cnpass)
	{        
		$cnpassErr = "Password did not match";
		$errCount = $errCount + 1;
	}
	}
	
	//gender validation
	if (empty($_POST["gender"])) 
	{
		$genderErr = "Gender is required";
		$errCount = $errCount + 1;
	} 
	else 
	{
		$gender = $_POST["gender"];
	}
	//Birthday validation
	if (empty($_POST["dob"])) 
	{
		$dobErr = "Birth Date is required";
		$errCount = $errCount + 1;
	} 
	else 
	{
		$dob = $_POST["dob"];
	}
	
	//json works
	if($errCount > 0) {
      $message = "<span class='error'>One or more error occurred!</span>";
      } else {
	if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'email'          =>     $_POST["email"],  
                     'username'     =>     $_POST["uname"], 
					 'password'     =>     $_POST["pass"],
					'cnpassword'     =>     $_POST["cnpass"],					 
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"],
					 'pp'     =>     ""
						
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>Submission Successful</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
	}
} 

function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>


<fieldset>

HM Company

<div align=right>
<?php include 'include/header.php';?>
</div>
 </fieldset>
 
 <fieldset>
<h1>Registration</h1>

 <fieldset>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
 </fieldset>
 
  <fieldset>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
   </fieldset>
    <fieldset>
  User Name: <input type="text" name="uname" value="<?php echo $uname;?>">
  <span class="error">* <?php echo $unameErr;?></span>
  <br><br>
  </fieldset>
  <fieldset>
   Password: <input type="text" name="pass" value="<?php echo $pass;?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
	</fieldset>
	
	<fieldset>
   Confirm Password: <input type="text" name="cnpass" value="<?php echo $cnpass;?>">
  <span class="error">* <?php echo $cnpassErr;?></span>
  <br><br>
	</fieldset>
	
 <fieldset>
<p>Gender:</p>
 <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
 </fieldset>
 
  <fieldset>
   Birthday:<input type="date" name="dob" value="<?php echo $dob;?>">
  <span class="error">* <?php echo $dobErr;?></span>
  <br><br>
    </fieldset>
	
 <input type="submit" value="Submit">
 <br>
 <?php  
        if(isset($message))  
        {  
         echo $message;  
        }  
?>
</form>

 </fieldset>
 
 <fieldset>
 <div align=center>
<?php include 'include/footer.php';?>
</div>
</fieldset>
</body>
</html>