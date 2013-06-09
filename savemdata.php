<?php
$hostname = '127.0.0.1:3306';        
$dbname   = 'mapmark'; // Your database name.
$username = 'root';             // Your database username.
$password = '';                 // Your database password. If your database has no password, leave it empty.

mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');
mysql_select_db($dbname) or DIE('Database name is not available!');

// Gets data from URL parameters
$desc = $_GET['desc'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];


// Insert new row with user data
$query = sprintf("INSERT INTO `markers` " .
     " (`desc`, `lat`, `lng` ) " .
     " VALUES ('%s', '%s', '%s' );",
     mysql_real_escape_string($desc),
     mysql_real_escape_string($lat),
     mysql_real_escape_string($lng));

$result = mysql_query($query);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}

?>