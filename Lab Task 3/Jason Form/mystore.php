<!DOCTYPE HTML>  
<html>
<body>  
<?php
$nameErr = $unameErr = $emailErr = $passErr =$cnpassErr = $genderErr = $dobErr = "" ;
$name = $uname = $email =$pass =$cnpass =$gender = $dob = $message =$error= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{  if (empty($_POST["name"])) 
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
	else if (!preg_match('#^\w+\s\w+#', $name))
	{
		$nameErr = "Name must contains at least two words";
	}
	}
   if (empty($_POST["email"])) 
    {
		$emailErr = "Email is required";
	} 
	else 
	{
    $email = $_POST["email"];
	
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
      $emailErr = "Invalid email format";
    }
	}
	
	if (empty($_POST["uname"])) 
	{ 
		$unameErr = "User Name is required";
	} 
	else 
	{ 
		$uname = $_POST["uname"];
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
	
	if (empty($_POST["cnpass"]))
	{
	$cnassErr = "Please Confirm Password";
	}
	else
	{
		$cnpass = $_POST["cnpass"];
		if($pass != $cnpass)
	{        
		$cnpassErr = "Password did not match";
	}
	}
	
	
	if (empty($_POST["gender"])) 
	{
		$genderErr = "Gender is required";
	} 
	else 
	{
		$gender = $_POST["gender"];
	}
	
	if (empty($_POST["dob"])) 
	{
		$dobErr = "Birth Date is required";
	} 
	else 
	{
		$dob = $_POST["dob"];
	}
	if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["uname"], 
					 'password'     =>     $_POST["pass"],
					'cnpassword'     =>     $_POST["cnpass"],					 
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"]  
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


 ?>


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
 <?php  
       if(isset($message))  
      {  
          echo $message;  
      }  
  ?>  
</form>



</body>
</html>