<body>
<head>
    <title>Log out</title>

</head>
<body>

<fieldset>
House Management Company
<div align=right>
<?php include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/header.php';?>
</div>
</fieldset>
<fieldset>
<?php 
session_destroy();
$username = $pass = "";
setcookie('username', $username, time() -1);
setcookie('password', $pass, time() -1);
echo "You successfully logout. click here to <a href ='/project/Lab Task 6/User/view/Login.php'>Login Again</a>";

?>
</fieldset>


<fieldset>
 <div align=center>
<?php include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/footer.php';?>
</div>
</fieldset>
</body>
</html>