<?php

	$host = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$database = "hms";

	function getConnection()
	{
		$con = mysqli_connect($GLOBALS['host'], $GLOBALS['dbuser'], $GLOBALS['dbpass'], $GLOBALS['database']);
		return $con;
	}

?>
