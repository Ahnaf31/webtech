<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>

</head>
<body>

<fieldset>
HM Company
<div align=right>
<?php include 'include/header.php';?>
</div>
</fieldset>


<fieldset>
Account <br>
___________<br>
<div align=left>
<?php include 'include/sidebar.php';
?>
</div>

<?php
// Initialize variables
if (isset($_SESSION['username'])) {
    $cpassErr = $npassErr = $rpassErr = $userErr = "";
    $username = "";
    $cpass = $npass = $rpass = "";
    $errCount = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_SESSION['username'];

            if (empty($_POST["cpass"])) {
                $cpassErr = "Current password is required to change password";
                $errCount = $errCount + 1;
            } else {
                $cpass = check_input($_POST["cpass"]);
                $npass = check_input($_POST["npass"]);
                $rpass = check_input($_POST["rpass"]);

                if (empty($npass)) {
                    $npassErr = "New password is required to change password";
                    $errCount = $errCount + 1;
                }

                if (empty($rpass)) {
                    $rpassErr = "You must retype your new password!";
                    $errCount = $errCount + 1;
                }

                if ($npass === $cpass) {
                    $npassErr .= " New Password should not be same as the Current Password";
                    $errCount = $errCount + 1;
                }

                if ($npass !== $rpass) {
                    $rpassErr .= " Retype password don't match with new password!";
                    $errCount = $errCount + 1;
                }  

                if ($errCount <= 0) {
                     if (!preg_match('@[^\w]@', $npass)) {
                        $npassErr = "New Password must contain at least one of the special characters (@, #, $,%)";
                        $errCount = $errCount + 1;
                    }
                }

            }

        if ($errCount < 1){
            $data = file_get_contents("data.json");

            $array = json_decode($data);
            $user_found = false;
            $pass_change = false;
            foreach($array as $item) {
                if ($username === $item->username){
                    $user_found = true;
                   
                    if ($cpass === $item->password){
                        echo "<br>";
                        echo "Hey $item->name! Thanks for changing the password. Your request is processing...";   
                        $item->password = $npass;
						$item->cnpassword = $npass;
                        echo "<br>";
                        $pass_change = true;

                    }else{
                        $cpassErr .= "Please enter correct password or go to forget password";
                    }
                }
            }

            if ($pass_change){
                $final_data = json_encode($array);
                if(file_put_contents('data.json', $final_data)){
                    echo "<span style='color: green'> Your Password has been Changed Successfully!</span><br>";
                }
            }

            if (!$user_found){
                echo $userErr .= "No account found!";
            }

        }

    }


} 
else{
    header('Location: Login.php');
}

function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
 
<fieldset>
 <div align=center>
<?php include 'include/footer.php';?>
</div>
</fieldset>
</body>
</html>