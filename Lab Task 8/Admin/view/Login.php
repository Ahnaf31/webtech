<!DOCTYPE html>
<html>
<head>

<script defer src="../js/login.js"></script>
    <title>Log in</title>



</head>
<body style="background-color:#1c87c9;">

House Management Company
<div align=right>
<?php include 'C:/xampp/htdocs/project/Lab Task 8/Admin/Navigation/header.php';?>
</div>




 <form id="LOGIN_form" action="../controller/loginCheck.php" method="post" onsubmit="return Lcheck();"/>


		<center><h1>LOGIN FORM</h1>
		<div>
			<input type="text" id="name" name="username" placeholder="Username" onkeypress='return onlyalphabets(event)'/>
		</div>
		<div>
			<input type="password" id="password" name="password" placeholder="Password">
		</div>
		<div>
			<button type="submit" name="submit" id="submit" onclick="Lcheck()">L O G ! N</button>
			
		</center></div>

	</form>



 <div align=center>
<?php include 'C:/xampp/htdocs/project/Lab Task 8/Admin/Navigation/footer.php';?>
</div>

</body>
</html>