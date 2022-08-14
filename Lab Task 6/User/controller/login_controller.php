
<?php
require_once "../model/model.php";

session_start();
if(isset($_POST['submit']))
{

if(isset($_POST['remember'])) {
setcookie("username", $_POST["username"], time()+1000);
setcookie("password", $_POST["password"], time()+1000);
}

  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }

  $username=$password="";
  $flag=1;


  if (empty($_POST["username"])) {
    echo "User Name is required";
    $flag=0;
  }
  else {
   $username = test_input($_POST["username"]);

    if (!preg_match("/^[a-zA-Z-. ]*$/",$username)) {
       echo "Only letters and white space allowed";
       $flag=0;
     }
     else {
       if(strlen($username)<2)
       {
          echo "Name must contains at least two character ";
          $flag=0;
       }

     }
  }


if(!empty($_POST["password"])) 
    {
    $password = test_input($_POST["password"]);
    if (strlen($_POST["password"]) < '8') 
    {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) 
    {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) 
    {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) 
    {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}
elseif(!empty($_POST["password"])) 
{
    $passwordErr = "Please enter password   ";
} 


if($flag==0){
  header('Location: ../view/login.php');
}


  if($flag==1)
  {
    try {

      $data = searchUsername($username);
      if($data!=NULL)
      {
        foreach ($data as $i => $user):

             $passwordFromDB= $user['password'] ;
        endforeach;
        if($password==$passwordFromDB)
        {session_start();
          $_SESSION['username']=$username;

          header('Location: ../view/UserDashboard.php');
        }
        else {
          echo "Incorrect Password";
        }
      }else {
        echo "Username not found";
      }


    } catch (Exception $ex) {
      echo $ex->getMessage();
    }

  }

}

else {
  echo "You are not allowed to access this page";
}
if(!empty($_POST["remember"])) {
  setcookie ("username",$_POST["username"],time()+ 1000);
  setcookie ("password",$_POST["password"],time()+ 1000);
  echo "Cookies Set Successfuly <br>";
  echo "Welcome ". $_POST["username"];
} else {
  setcookie("username","");
  setcookie("password","");
}



?>