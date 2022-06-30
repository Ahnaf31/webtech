</head>
<body>
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
$userErr = $passErr = "";
$username = $password = ""; 
$errCount = 0;
$msg1 = $msg2 = "";
$email = "";
$emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required for this action!";
        $errCount = $errCount + 1;
    } else {
        $email = check_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email="";
            $errCount = $errCount + 1;
        }
    }

    if ($errCount < 1){

        $data = file_get_contents("Data.json");

        $array = json_decode($data);
        $user_found = false;
        foreach($array as $item) {

            if ($email === $item->email){
                $user_found = true;
                if ($item->password){
                    $msg1 ="Your username is $item->username </br>";
                    $msg2 ="Your Password is $item->password </br>";
                }else{
                    $passErr = "Password Not Found!!";
                }
            }
        }
        if (!$user_found){
            $userErr = "No account found!";
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
<h2>FORGOT PASSWORD</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Enter Email: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br> <hr>

<input type="submit" name="submit" value="Submit"><br>  
<?php echo $msg1;echo $msg2;echo $userErr;?>
</form>
</fieldset>
<fieldset>
 <div align=center>
<?php include 'include/footer.php';?>
</div>
</fieldset>
</body>
</html>