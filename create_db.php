﻿<?php
require_once "conn_req.php";
$mydbconn = new MySQLi;
$mydbconn->connect($dbserver,$dbuser,$dbpassword,$dbname);
if ($mydbconn->connect_error) 
  echo "Error DB connect number ".$mydbconn->connect_errno; 
else echo "Ser GUT!";
$credb="CREATE TABLE IF NOT EXISTS SITES (
			ID  int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			URL varchar(256) NOT NULL,
			CREATED_BY_USER_ID int(16) NOT NULL)";
$mydbconn->real_query($credb);
$mydbconn->commit();
if ($mydbconn->error) 
  echo "Error DB ".$mydbconn->errno; 
?>
