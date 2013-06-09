<?php

// Inialize session
session_start();

// Include database connection settings
//include('config.inc');

$hostname = '127.0.0.1:3306';        
$dbname   = 'mapmark'; // Your database name.
$username = 'root';             // Your database username.
$password = '';                 // Your database password. If your database has no password, leave it empty.

mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');
mysql_select_db($dbname) or DIE('Database name is not available!');


$username1=mysql_real_escape_string($_POST['username']);
$password1=mysql_real_escape_string($_POST['password']);

$sql="SELECT * FROM validate1 WHERE username='$username1' and password='$password1'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

// Retrieve username and password from database according to user's input
//$login = mysql_query("SELECT * FROM validate WHERE (username = '" . mysql_real_escape_string($_POST['username']) . "') and (password = '" . //mysql_real_escape_string(md5($_POST['password'])) . "')");

// Check username and password match
//if (mysql_num_rows($login) == 1) {
// Set username session variable
if($count==1){
$_SESSION['username'] = $_POST['username'];
// Jump to secured page
header('Location: landingpage.php');
}
else {
// Jump to login page
header('Location: login.php');
}

?>