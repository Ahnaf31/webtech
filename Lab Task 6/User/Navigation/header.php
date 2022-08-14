
<?php 
session_start();
if (isset($_SESSION['password'])) {
    echo '<span>Logged in as '.$_SESSION['username'] .'</span> | ';
    echo '<a href="/project/Lab Task 6/User/view/Logout.php" style="color:red" >Logout</a> |';
    echo '<hr>';
} else {
    echo '
    <a href="/project/Lab Task 6/Home.php" style="color:orange" >Home</a> |
    <a href="/project/Lab Task 6/User/view/Login.php" style="color:orange" >Login</a> |
	Registration for
	<a href="/project/Lab Task 6/User/view/User_registration.php" style="color:green" >User</a> |
  <hr>
';

}
?>


