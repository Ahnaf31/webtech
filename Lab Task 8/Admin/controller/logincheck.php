<?php

	session_start();
	include('../model/model.php');

	if(isset($_POST['submit']))
	{

		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = (validate($username, $password));

		if(($user) > 0)
		{
			$_SESSION['user'] = $user;
			setcookie('username', $username, time()+2400, '/');
			header("location: ../view/adminDashboard.php");
		}
		else
		{
			echo "<center><h2>!! INVALID USERNAME/PASSWORD !!";
			header("refresh:3;	url=../view/Login.php");
		}

	}
	else
	{
		header("location: ../view/Login.php");
	}

?>
