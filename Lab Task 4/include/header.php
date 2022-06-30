
<?php 
session_start();
if (isset($_SESSION['username'])) {
    echo '<span>Logged in as '.$_SESSION['username'] .'</span> | ';
    echo '<a href="Logout.php">Logout</a>';
    echo '<hr>';
} else {
    echo '
    <a href="/project/Lab 4/Public_home.php">Home</a> |
    <a href="/project/Lab 4/Login.php">Login</a> |
	<a href="/project/Lab 4/Registration.php">Registration</a>
  <hr>
';
}
?>

