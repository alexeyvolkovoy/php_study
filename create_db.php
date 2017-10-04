<?php
require_once "conn_req.php";
$mydbconn = new MySQLi;
$mydbconn->connect($dbserver,$dbuser,$dbpassword,$dbname);
if ($mydbconn->connect_error) 
  echo "Error DB connect number ".$mydbconn->connect_errno; 
else echo "Ser GUT!";
$credb="CREATE TABLE IF NOT EXIST SITES (
			ID  int(16) AUTO_INCREMENT PRIMARY KEY,
			URL text(),
			CREATED_BY_USER_ID int(16))";
$mydbconn->real_query($credb);
$mydbconn->commit();
if ($mydbconn->error) 
  echo "Error DB ".$mydbconn->errno; 
?>
