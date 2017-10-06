<?php
require_once 'login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$db_server) die("Unable to connect to MySQL: " . mysqli_connect_error());

echo "Інформація про сервер: ".mysqli_get_server_info($db_server)."<br/>";

$query  = "SELECT * FROM classics";
$result = mysqli_query($db_server,$query);
printf("Запрос вернул %d строк<br//>", mysqli_num_rows($result));

if (!$result) die ("Database access failed: " . mysqli_connect_error());
$rows = mysqli_num_rows($result);
// все содержимое результата
//echo 'Result ДО<br//> ';
//var_dump($result);
//mysqli_store_result($db_server);
//echo 'Result ПОСЛЕ<br//> ';
//var_dump($result);


for ($j = 0 ; $j < $rows ; ++$j)
{
    echo "Роу $j".'<br>';
    $bookRow = mysqli_fetch_row($result);
    var_dump($bookRow);
    for ($k = count($bookRow);$k >= 0; $k--)
    {
        echo $bookRow[$k].'<br>';
    }

}
mysqli_close($db_server);
?>