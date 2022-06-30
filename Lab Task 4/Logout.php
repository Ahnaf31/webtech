<body>
<head>
    <title>Log out</title>

</head>
<body>

<fieldset>
HM Company
<div align=right>
<?php include 'include/header.php';?>
</div>
</fieldset>
<fieldset>
<?php 
session_destroy();
$username = $pass = "";
setcookie('username', $username, time() -1);
setcookie('password', $pass, time() -1);
echo "You successfully logout. click here to <a href ='Login.php'>Login Again</a>";

?>
</fieldset>


<fieldset>
 <div align=center>
<?php include 'include/footer.php';?>
</div>
</fieldset>
</body>
</html>