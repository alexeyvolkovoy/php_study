<?php
require_once "conn_req.php";
$mydbconn = new MySQLi;
$mydbconn->connect($dbserver,$dbuser,$dbpassword,$dbname);
if ($mydbconn->connect_error) 
  echo "Error DB connect number ".$mydbconn->connect_errno; 
else echo "Ser GUT!";
$credb="CREATE TABLE SITES
			ID  int(),
			URL text(),
			CREATED_BY_USER_ID int();
			";
$mydbconn->real_query($credb);
$mydbconn->commit();
if ($mydbconn->error) 
  echo "Error DB ".$mydbconn->errno; 
?>
