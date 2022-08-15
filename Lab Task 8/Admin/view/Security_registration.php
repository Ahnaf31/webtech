</head>
<body>
<head>

    <title>Registration for Security</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body style="background-color:#ccffff;">

<fieldset>
HM Company
<div align=right>
<?php include 'C:/xampp/htdocs/project/Lab Task 8/Admin/Navigation/header.php';?>
</div>
</fieldset>


 <fieldset>
 <script defer src="../js/security_registration.js"></script>
<form id="register_form" action="../controller/security_regChek.php" method="post" name="regform" onsubmit="return Rcheck();">
      <h1 style="color: Green; font-size: 30px; text-align:center"; > Security Registration</h1>
			FULL NAME:<input type="text" name="fname" placeholder="Full Name" value="" onkeypress='return onlyalphabets(event)'/><div id="fname" class="val"></div>
			<span></span>
			<br>USERNAME:<input type="text" name="username" placeholder="Name" id="username" onkeypress='return onlyalphabets2(event)'/>
			<span></span>
			<br>PASSWORD:<input type="password" name="password" placeholder="Password" id="password">
			<br>Confirm PASSWORD:<input type="password" name="Cpassword" placeholder="Confirm Your Password" id="Cpassword">
			<br>EMAiL:<input type="email" id="email" name="email" placeholder="Email" >
			<br>NID:<input type="nid" name="nid" placeholder="nid" id="nid" onsubmit="return Rcheck();">
			
			<span></span>
			<br><br>
			GENDER:
		<div id="gender">
			MALE ->><input type="radio"  name="gender" value="MALE" required />
					<input type="radio"  name="gender" value="FEMALE"> <<- FEMALE
		</div>
			<br>
		<br>
			<button style="cursor:move" type="submit" name="submit" id="submit" onclick="Rcheck()">Registration</button>
			
		</center>


</form>
 </fieldset>

<fieldset>
 <div align=center>
<?php include 'C:/xampp/htdocs/project/Lab Task 8/Admin/Navigation/footer.php';?>
</div>
</fieldset>

</body>
</html>