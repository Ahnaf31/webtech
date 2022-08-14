<?php

require_once 'dbconnect.php';

function validate($username, $password)
	{

		$con = getConnection();
		$sql = "select * from t_registration where username='{$username}' and password='{$password}'";
		$result = mysqli_query($con, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}


	function getAllUsers()
	{
		$con = getConnection();
		$sql = "select * from t_registration";
		$result = mysqli_query($con, $sql);
		return $result;
	}
	
function searchUsername($username){
    $con = getConnection();
    $sql = "select * from t_registration where username='{$username}'";
	$result = mysqli_query($con, $sql);
		return $result;
}

function getPassword($username){
	$con = getConnection();
    $sql = "select PASSWORD from t_registration where username='{$username}'";
	$result = mysqli_query($con, $sql);
		return $result;
}

