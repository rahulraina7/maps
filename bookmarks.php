<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: index.php');
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Log in to Intelli-Track</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="1.css" rel="stylesheet" />
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="css/5grid/init.js?use=mobile,desktop,1000px"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/5grid/core.css" />
			<link rel="stylesheet" href="css/style.css" />
			
<link rel="stylesheet" href="css/tablestyle.css" />
		</noscript>
		<style type="text/css">
		
			#main { 
			padding-top:  100px;
			padding-left: 55px; }
			body
{
    line-height: 1.6em;
}

#rounded-corner
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 45px;
	width: 480px;
	text-align: left;
	border-collapse: collapse;
}
#rounded-corner thead th.rounded-company
{
	background: #b9c9fe url('table-images/left.png') left -1px no-repeat;
}
#rounded-corner thead th.rounded-q4
{
	background: #b9c9fe url('table-images/right.png') right -1px no-repeat;
}
#rounded-corner th
{
	padding: 8px;
	font-weight: normal;
	font-size: 13px;
	color: #039;
	background: #b9c9fe;
}
#rounded-corner td
{
	padding: 8px;
	background: #e8edff;
	border-top: 1px solid #fff;
	color: #669;
}
#rounded-corner tfoot td.rounded-foot-left
{
	background: #e8edff url('table-images/botleft.png') left bottom no-repeat;
}
#rounded-corner tfoot td.rounded-foot-right
{
	background: #e8edff url('table-images/botright.png') right bottom no-repeat;
}
#rounded-corner tbody tr:hover td
{
	background: #d0dafd;
}

		</style>
       
		
		
	</head>
	<body>
	<nav id="nav">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="landingpage.php">Map-Mark</a></li>
					<li><a href="logout.php">Log-Out</a></li>
					<li><a href="credits.html">Credits</a></li>
				</ul>
			</nav>
			
			<html>
<body>
<?php
$hostname = '127.0.0.1:3306';        
$dbname   = 'mapmark'; // Your database name.
$username = 'root';             // Your database username.
$password = '';                 // Your database password. If your database has no password, leave it empty.

mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');
mysql_select_db($dbname) or DIE('Database name is not available!');
$query="SELECT * FROM markers";
$result=mysql_query($query);

$fields_num = mysql_num_fields($result);
echo "<div id=tab1 style= width:40%;margin-left:auto;margin-right:auto;position:relative;top:200px;>";
echo "<table id=rounded-corner>";//printing table headers
echo '
<thead>
    	<tr>
        	<th scope="col" class="rounded-company">Serial</th>
            <th scope="col" class="rounded-q1">Description</th>
            <th scope="col" class="rounded-q1">Latitude</th>
            <th scope="col" class="rounded-q3">Longitude</th>
        </tr>
    </thead>';
// printing table rows
while($row = mysql_fetch_row($result))

{
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "</tr>\n";
}
echo "</table></div>";
?>


</body>
</html>
