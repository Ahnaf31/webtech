
<?php 
session_start();
if (isset($_SESSION['username'])) {
    echo '<span>Logged in as '.$_SESSION['username'] .'</span> | ';
    echo '<a href="Logout.php">Logout</a>';
    echo '<hr>';
} else {
    echo '
    <a href="/project/Mid Project/Home.php">Home</a> |
    <a href="/project/Mid Project/Login.php">Login</a> |
	<a href="/project/Mid Project/Registration.php">Registration</a>
  <hr>
';
}
?>

