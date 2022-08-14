<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

</head>
<body>

<fieldset>
House Management Company
<div align=right>
<?php include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/header.php';?>
</div>
</fieldset>


<fieldset>
	<div align=left><img src='/project/Lab Task 6/logo1.jpg' alt="HM Management" width="70" height="70"></div>

Account <br>
___________<br>
<div align=left>
<?php include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/sidebar.php';
?>

</div>

<center>
<?php
if (isset($_SESSION['username'])) {
    echo "<h3> Welcome ".$_SESSION['username']." to the Tenant Panel </h3>";
} 

?>
</center>
</fieldset>


<fieldset>
 <div align=center>
<?php include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/footer.php';?>
</div>
</fieldset>
</body>
</html>