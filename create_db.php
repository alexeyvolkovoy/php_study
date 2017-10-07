<?php
require_once "conn_req.php";
$mydbconn = new MySQLi;
$mydbconn->connect($dbserver,$dbuser,$dbpassword,$dbname);
if ($mydbconn->connect_error) 
  echo "Error DB connect number ".$mydbconn->connect_errno; 
else echo "Ser GUT!<br/>";
$credb=array(
"DROP TABLE 'study'.'USERS'",
"CREATE TABLE `study`.`USERS` ( `ID` INT(16) NOT NULL AUTO_INCREMENT PRIMARY KEY, `USER_NIC` VARCHAR(64) NOT NULL , `USRE_F_NAME` VARCHAR(64) NULL , `USER_L_NAME` VARCHAR(64) NULL , `PASSWORD` VARCHAR(1024) NOT NULL , `CELL_PHONE` VARCHAR(32) NOT NULL , `E_MAIL` VARCHAR(64) NOT NULL , `VIBER` VARCHAR(32) NOT NULL) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci",
"DROP TABLE 'study'.'SITES'",
"CREATE TABLE `study`.`SITES` ( `ID` INT(16) NOT NULL AUTO_INCREMENT , `SITE_NAME` VARCHAR(256) NOT NULL , `URL` VARCHAR(256) NOT NULL , `COMMENT` VARCHAR(256) NULL , `ANSWER` TEXT NOT NULL , `REG_DT` DATETIME NOT NULL , `OWNER` INT(16) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci",
"DROP TABLE 'study'.'STAT'",
"CREATE TABLE `study`.`STAT` ( `ID` INT(16) NOT NULL AUTO_INCREMENT , `SITE_ID` INT(16) NOT NULL , `STATE_ID` INT(16) NOT NULL , `CHECK_DT` DATETIME NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci",
"DROP TABLE 'study'.'STATES'",
"CREATE TABLE `study`.`STATES` ( `ID` INT(16) NOT NULL AUTO_INCREMENT , `STATE` VARCHAR(64) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci"
);
foreach($credb as $dbcommand) {
	echo $dbcommand."<br/>";
   $mydbconn->real_query($dbcommand);
   $mydbconn->commit();
//   echo $mydbconn->connect_error."<br/>";
   if ($mydbconn->connect_error)  {
     echo "Error DB ";
   }   else {
     echo "SQL command run successfull<br/>";
   }

}


?>


