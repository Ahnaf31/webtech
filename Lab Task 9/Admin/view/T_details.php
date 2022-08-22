<div align=right>
<?php include 'C:/xampp/htdocs/project/Lab Task 9/Admin/Navigation/header.php';?>
</div>
<?php
	
	
	
	require_once('../model/model.php');
	$result = getAllTenants();
	if(!isset($_SESSION['username'])){  
		header("location: Login.php");
		
	}
	
	$con = mysqli_connect('127.0.0.1', 'root', '', 'hms');
	$sql =	"SELECT * FROM `t_registration`"; 
	$results = mysqli_query($con,$sql);
	
?>

<html>
<head>
		<title>Tenant List</title>
		
</head>
<body style="background-color:#ccffff;">

<section class="main">
	
	<h1 id="abc"><span style=color:#5c5c8a><b>Search your expected Tenant from this table :</b></span></h1>

	<form >
		<input type="text" id="ahnafajax" name="ahnafajax" onkeyup="selected_list()">
	</form>

	<br>
	<div id="result">
	
	<?php
		echo "<table border='5' BORDERCOLOR=#5c5c8a>
									<tr>
										<td><span style='color:#004d4d '><b>FULL NAME</b></span></td>
										<td><span style='color:#004d4d '><b>USER NAME</b></span></td>
										<td><span style='color:#004d4d '><b>EMAIL ADDRESS</b></span></td>
										<td><span style='color:#004d4d '><b>GENDER</b></span></td>
										<td><span style='color:#004d4d '><b>NID NUMBER</b></span></td>
										</tr>
									";
		
		$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'hms');
		$sql = "select * from t_registration";
		$result = mysqli_query($con, $sql);
		while($row=mysqli_fetch_array($result))
			{
					echo "<tr>
												<td>".$row['fname']."</td>
												<td>".$row['username']."</span></td>
												<td>".$row['email']."</span></td>
												<td>".$row['gender']."</span></td>
												<td>".$row['nid']."</span></td>
												
												</tr>";
							
			}
		?>
		</table>
	
	
	</div>

	<script type="text/javascript">
		
		function selected_list(){
			var search = document.getElementById("ahnafajax").value;
			var xhttp = new XMLHttpRequest();	
			
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200){
			    	document.getElementById('result').innerHTML = this.responseText;
			    }
			};
			
			xhttp.open("GET", "../controller/T_details_controller.php?key="+search, true);
			xhttp.send(); 
		}
	</script>		
		
</section>
	
</body>

</html>
