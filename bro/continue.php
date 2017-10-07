<?php // continue.php
session_start();

require_once 'login.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_SESSION['username']))
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
}
else echo "Please <a href='authenticate.php'>click here</a> to log in.";
$result->close();
$connection->close();
require_once 'footer.php';
?>