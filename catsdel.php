<?php
require_once 'login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);

if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

mysqli_select_db($db_server, $db_database)
or die("Unable to select database: " . mysqli_error($db_server));

$query  = "DROP TABLE cats";
$result = mysqli_query($db_server,$query);

if (!$result) die ("Database access failed: " . mysqli_error($db_server));
?>