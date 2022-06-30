<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

</head>
<body>

<fieldset>
HM Company
<div align=right>
<?php include 'include/header.php';?>
</div>
</fieldset>

<?php
$nameErr = $emailErr = $genderErr = $dobErr = "" ;
$name = $email = $gender = $dob = $message =$error= "";
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
				if (file_exists('data.json')) 
			{
                $data = file_get_contents("data.json");
                $array = json_decode($data);
                $user_found = false;
                $user_edited = false;
                foreach ($array as $item) 
				{	   
	   
					if ($_SESSION['username'] === $item->username) 
					{
                        $user_found = true;
                        if (!($name === $item->name)) {
                            $item->name = $name;
                            $user_edited = true;
                        }
                        if (!($email === $item->email)) {
                            $item->email = $email;
                            $user_edited = true;
                        }
                        if (!($gender === $item->gender)) {
                            $item->gender = $gender;
                            $user_edited = true;
                        }
                        if (!($dob === $item->dob)) {
                            $item->dob = $dob;
                            $user_edited = true;
                        }
                    }
                }
                if ($user_edited)
				{
                    $final_data = json_encode($array);
                    if(file_put_contents('data.json', $final_data))
					{
                        $message=  "User Edited Successfully!";
                    }
                }
            }
        }
		
		else 
	{
        $data = file_get_contents("data.json");
        $array = json_decode($data);
        foreach ($array as $item) 
		{
            if ($_SESSION['username'] === $item->username) {
                $name = $item->name;
                $email = $item->email;
                $gender = $item->gender;
                $dob = $item->dob;
				}
		}
	}
}
} 

function check_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<fieldset>
Account <br>
___________<br>
<div align=left>
<?php include 'include/sidebar.php';
?>
</div>


<fieldset>
<h1>Edit Profile</h1>

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
	
 <input type="submit" value="update">
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