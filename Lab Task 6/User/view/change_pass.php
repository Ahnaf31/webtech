<?php
	
	
	$con = mysqli_connect('127.0.0.1', 'root', '', 'hms');
	$sql = "SELECT * FROM t_registration"; 
	$results = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html>
<head>
    
	<title> Change Password</title>
</head>
<body style="background-color:#ccffff;">
<fieldset>

House Management Company
<div align=right>
<?php
include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/header.php';?>
</div>
 </fieldset>
 <?php
if (isset($_SESSION['username'])) {
include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/sidebar.php';}


?>
 <head>  
        <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head> 
  
        <div class="container" style="width:1200px;">              
                <div  align=center class="table-responsive"> 
                     <table class="table table-bordered">  
					 
 <form action="../controller/change_pass_controller.php" method="post">
		
	
		<tr>
				
				<td><center><b>Password</b></center></td>
				
		</tr>

		<tr>
			
		<?php	if (isset($_SESSION['username'])) {
			while($row = mysqli_fetch_array($results))
			{

				echo "<tr><form action=../controller/edit_profile_controller.php method=post>";
				echo "<input type=hidden name=id value='".$row['id']."'>";
				echo "<td><center><input type=text name=pass value='".$row['password']."'></center></td>";

				
				echo "<td><input type=submit value=UPDATE></td>";
				echo "</form></tr>";
			}
		}			
		else{
			header('Location: /project/Lab Task 6/User/view/Login.php');
			}
		?>
		
		</tr>
		</table>
		</div>
                 </div>
	</form>

 <fieldset>
 <div align=center>
<?php include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/footer.php';?>
</div>
</fieldset>
</body>
</html>