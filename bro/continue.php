<?php // continue.php
session_start();

require_once 'login.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_SESSION['username']) && ($_POST['in_command'] == 'Додати сайт'))
{
    $sitename = $_POST['sitename'];
    $url = $_POST['url'];
    $user_id = $_POST['user_id'];
 //   $answer = htmlspecialchars(file_get_contents($url, NULL, NULL, 0, 2048));
    $answer = hash('md5',file_get_contents($url, NULL, NULL, 0, 2048));
    // echo "$sitename<br />$url<br />$user_id<br />".htmlspecialchars($answer);
    $query = "INSERT INTO `SITES`(`SITE_NAME`, `URL`, `COMMENT`, `ANSWER`, `REG_DT`, `OWNER`) VALUES ('$sitename','$url','CoMMENT','$answer',NOW(),$user_id)";
    echo $query;
    $result = $connection->query($query);
    echo "Zashibiss!!!<br />";
}

 if (isset($_SESSION['username']) && ($_POST['in_command'] == 'Перевірити сайт'))
{
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $firstname = $_SESSION['firstname'];
    $lastname  = $_SESSION['lastname'];
    $user_id  = $_SESSION['user_id'];

    echo "Welcome back $firstname.<br />
          Your full name is $firstname $lastname.<br />
          Your username is '$username'
          and your ID is '$user_id'<br/>
          and your password is '$password'.<br/>";

    $query = "SELECT ID,SITE_NAME,ANSWER,URL FROM SITES WHERE OWNER='$user_id'";
    $result = $connection->query($query);
    echo "<table border='1'><tr><td>ID</td><td>Ім'я сайту</td><td>Опції</td></tr>";
    while ($row = $result->fetch_assoc()) {
        if ($row['ANSWER'] == hash('md5',file_get_contents($row['URL'], NULL, NULL, 0, 2048)))
            $status_color = 'green';
        else $status_color = 'red';
        echo "<tr><td>".$row['ID']."</td><td>".$row['SITE_NAME']."</td><td style=\'background-color: ".$status_color."\;\'>Опції</td><td>".$status_color."</td></tr>";
    }
    echo "</table>";
    echo "<br/>";
    echo "Zashibiss!!!<br />";
}

if (isset($_SESSION['username']) && (!$_POST['in_command']))
{
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $firstname = $_SESSION['firstname'];
    $lastname  = $_SESSION['lastname'];
    $user_id  = $_SESSION['user_id'];

    echo "Welcome back $firstname.<br />
          Your full name is $firstname $lastname.<br />
          Your username is '$username'
          and your ID is '$user_id'<br/>
          and your password is '$password'.<br/>";

    $query = "SELECT ID,SITE_NAME FROM SITES WHERE OWNER='$user_id'";
    $result = $connection->query($query);
    echo "<table border='1'><tr><td>ID</td><td>Ім'я сайту</td><td>Опції</td></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row['ID']."</td><td>".$row['SITE_NAME']."</td><td>Опції</td></tr>";
    }
    echo "</table>";
    echo "<br/>";
    require_once 'site_add_page.php';
    echo $site_add_form;
    require_once 'site_check_page.php';
    echo $site_check_form;
}
else echo "Please <a href='authenticate.php'>click here</a> to log in.";
$result->close();
$connection->close();
require_once 'footer.php';


?>