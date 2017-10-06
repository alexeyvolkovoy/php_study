<?php // query.php
require_once 'login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error());

// mysqli_select_db($db_database)
// or die("Unable to select database: " . mysqli_error());

$query  = "SELECT * FROM classics";
$result = mysqli_query($db_server, $query);

if (!$result) die ("Database access failed: " . mysqli_error());

$rows = mysqli_num_rows($result);
$assoc_res = mysqli_fetch_assoc($result);
var_dump($assoc_res);
for ($j = 0 ; $j < $rows-1 ; ++$j)
{
    echo 'Привет Ромашки ' . '<br>';
    $assoc_res = mysqli_fetch_assoc($result);
    echo 'Author: '   . $assoc_res['author']   . '<br>';
    echo 'Title: '    . $assoc_res['title']    . '<br>';
    echo 'Category: ' . $assoc_res['category'] . '<br>';
    echo 'Year: '     . $assoc_res['year']     . '<br>';
    echo 'ISBN: '     . $assoc_res['isbn']     . '<br><br>';

}
?>