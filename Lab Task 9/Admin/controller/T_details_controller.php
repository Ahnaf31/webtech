<?php
	
	

	$search = $_GET['key'];

	$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'hms');
	$sql = "select * from t_registration where username like '%{$search}%'";
	$result = mysqli_query($con, $sql);
	$count =mysqli_num_rows($result);
	

	
	if($count){

		$data = "<table border='5' BORDERCOLOR=#ff4d4d>
									<tr>
										<td><span style='color:black '><b>FULL NAME</b></span></td>
										<td><span style='color:black '><b>USER NAME</b></span></td>
										<td><span style='color:black '><b>EMAIL ADDRESS</b></span></td>
										<td><span style='color:black '><b>GENDER</b></span></td>
										<td><span style='color:black '><b>NID NUMBER</b></span></td>
										</tr>
									";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr>
					<td><span style='color:#cc3300 '>{$row['fname']}</span></td>
					<td><span style='color:#cc3300 '>{$row['username']}</span></td>
					<td><span style='color:#cc3300 '>{$row['email']}</span></td>
					<td><span style='color:#cc3300 '>{$row['gender']}</span></td>
					<td><span style='color:#cc3300 '>{$row['nid']}</span></td>
			</tr>";
		}

		$data .= "</table>";
		echo $data;

	}else{
		echo "<span style=color:#FC8C41><b>No result found!!!!!</b></span>";
		
		
	}
?>