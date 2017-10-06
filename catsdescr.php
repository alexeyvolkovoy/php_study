<?php
require_once 'login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);

if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysqli_select_db($db_server, $db_database)
or die("Unable to select database: " . mysqli_error($db_server));

$query  = "DESCRIBE cats";
$result = mysqli_query($db_server, $query);

if (!$result) die ("Database access failed: " . mysqli_error($db_server));

$rows = mysqli_num_rows($result);

echo "<table><tr><th>Column</th><th>Type</th><th>Null</th><th>Key</th></tr>";

for ($j = 0 ; $j < $rows ; ++$j)
{
    $row = mysqli_fetch_row($result);
    echo "<tr>";

    for ($k = 0 ; $k < 4 ; ++$k)
        echo "<td>$row[$k]</td>";

    echo "</tr>";
}

echo "</table>";
?>