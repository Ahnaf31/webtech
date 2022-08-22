<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

</head>
<body style="background-color:#ccffff;">

<fieldset>
House Management Company
<div align=right>
<?php include 'C:/xampp/htdocs/project/Lab Task 9/Admin/Navigation/header.php';?>
</div>
</fieldset>


<fieldset>
	<div align=left><img src='/project/Lab Task 9/logo.jpg' alt="HM Management" width="70" height="70"></div>

Account <br>
___________<br>
<div align=left>
<?php include 'C:/xampp/htdocs/project/Lab Task 9/Admin/Navigation/sidebar.php';
?>

</div>

<center>
<?php
if (isset($_SESSION['username'])) {
    echo "<h3> Welcome ".$_SESSION['username']." to the Admin Panel </h3>";
} 

?>
</center>
</fieldset>


<fieldset>
 <div align=center>
<?php include 'C:/xampp/htdocs/project/Lab Task 9/Admin/Navigation/footer.php';?>
</div>
</fieldset>
</body>
</html>