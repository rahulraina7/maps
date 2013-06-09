<?php 

$hostname = '127.0.0.1:3306';        
$dbname   = 'mapmark'; // Your database name.
$username = 'root';             // Your database username.
$password = '';                 // Your database password. If your database has no password, leave it empty.

mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');
mysql_select_db($dbname) or DIE('Database name is not available!');


$regname=mysql_real_escape_string($_POST['regname']);
$regpassword=mysql_real_escape_string($_POST['regpwd']);


//$name = strip_tags(substr($_POST['name'],0, 100));
//$safename = mysql_escape_string($name);
//$password = strip_tags(substr($_POST['password'],0, 100));
//$safepassword = mysql_escape_string($password);
/* Securing registration page from SQL injection and XSS */

//$encrypted = md5($safepassword);

// Encrypting Password Using md5 algo
$query=mysql_query("INSERT INTO validate1 VALUES('$regname','$regpassword')"); 
if($query){
header('Location: success.html');
}
else{
sleep(4);
header('Location: register.php');

}
?>

