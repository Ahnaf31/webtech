<?php
	
	session_start();
	require('../model/model.php');
	
	if(isset($_POST['submit']))
	{
		$fname = $_POST['fname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$nid = $_POST['nid'];
		
		$con = mysqli_connect('127.0.0.1', 'root', '', 'hms');
		
		if(!$con)
		{
			echo 'connection to server is denied';
			header("refresh:6;	url=../view/User_registration.php");
		}		
		else
		{
		
		$sql = "INSERT INTO `t_registration` (`fname`,`username`,`password`,`email`,`nid`,`gender`) VALUES ('$fname','$username','$password','$email','$nid','$gender')";
				
			if(mysqli_query($con, $sql))
			{
				echo "COngraTS !! New User is inserTed successfully! Now You can Login";
				header("refresh:10;	url=../view/Login.php");
			}
			else
			{
				echo "!! ERROR to store in database !!";
				header('Location: /project/Lab Task 6/User/view/user_registration.php');
			}
			
		}
		
	}
	else
	{
		echo "ERROR!";
		header('Location: /project/Lab Task 6/User/view/User_registration.php');
	}
	
?>