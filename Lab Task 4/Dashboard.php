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


<fieldset>
Account <br>
___________<br>
<div align=left>
<?php include 'include/sidebar.php';
?>
</div>

<center>
<?php
if (isset($_SESSION['username'])) {
    echo "<h3> Welcome ".$_SESSION['username']." to the House Management system </h3>";
} 
else
{
    header('location: Login.php');
}
?>
</center>
</fieldset>


<fieldset>
 <div align=center>
<?php include 'include/footer.php';?>
</div>
</fieldset>
</body>
</html>