<!DOCTYPE html>
<html>
<body>
<head>
    <title>View Profile</title>

</head>
<body style="background-color:#ccffff;">

<fieldset>
HM Company
<div align=right>

<?php include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/header.php';
require_once '../model/model.php';
$results = getAllUsers();

    $con = mysqli_connect('127.0.0.1', 'root', '', 'hms');
    $sql = "SELECT * FROM t_registration";
    $results = mysqli_query($con,$sql);

?>
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
      <body>  
        <div class="container" style="width:800px;">              
                <div  align=center class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Name</th> 
                               <th>E-mail</th>
                               <th>Gender</th>   
                               <th>Contact</th>  
							
                          </tr> 
						
						  
	<?php    while($row = mysqli_fetch_array($results))
	
            { ?>
		<tr>
		<td><?= $row['fname'] ?></td>
		<td><?= $row['email'] ?></td>
		<td><?= $row['gender'] ?></td>
		<td><?= $row['nid'] ?></td>
	</tr>

          <?php } ?>   

                     </table>  
                   </div>
                 </div>



<fieldset>
 <div align=center>
<?php include 'C:/xampp/htdocs/project/Lab Task 6/User/Navigation/footer.php';?>
</div>
</fieldset>
</body>
</html>