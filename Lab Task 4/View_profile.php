<!DOCTYPE html>
<html>
<body>
<head>
    <title>View Profile</title>

</head>
<body>

<fieldset>
HM Company
<div align=right>
<?php include 'include/header.php';?>
</div>
</fieldset>
<?php
if (isset($_SESSION['username'])) {
include 'include/sidebar.php';}


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
                               <th>Date of birth</th>  
							
                          </tr>  
                          <?php
							$pp_path = '';
							if (isset($_SESSION['username'])) {
                          $data = file_get_contents("data.json");  
                          $array = json_decode($data); 
                          foreach($array as $row)  
                          {  
							if ($_SESSION['username'] === $row->username){
								
								echo '<img src="' . $row->pp . '"width="130" height="130"> <br><a href="Profile_pic.php">Change Profile Picture</a> <br>';
								
                                   echo '<tr> 
								<td>'.$row->name.'</td>
                               <td>'.$row->email.'</td>
                               <td>'.$row->gender.'</td>
                               <td>'.$row->dob.'</td>
							   
                               </tr>'; 
							}      
                          }
							 echo '<br>';
							echo '<b><a href="edit_profile.php"> Edit Profile</a></b> <br>';
								
								} else{
										header('Location: login.php');
									}
                          ?>  
                     </table>  
                   </div>
                 </div>



<fieldset>
 <div align=center>
<?php include 'include/footer.php';?>
</div>
</fieldset>
</body>
</html>