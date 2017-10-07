<?php //setupusers.php
require_once 'login.php';

echo $_POST['in_command'];

if ($_POST['in_command']=='Новий користувач') {
    require_once 'register_page.php';
    echo $register_form;
}
if ($_POST['in_command']=='Зареєструватися') {

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($connection->connect_error) die($connection->connect_error);

$salt1    = "zp#%*";
$salt2    = "5U$#";
$user_nic = $_POST['username'];
$password = $_POST['password_1'];
$token    = hash('ripemd128', "$salt1$password$salt2");
$firstname = $_POST['firstname'];
$lastname = $_POST['familyname'];
$phone = $_POST['phone'];
$e_mail = $_POST['e_mail'];
$viber = $_POST['viber'];
add_user($connection, $user_nic, $firstname, $lastname, $token, $phone, $e_mail, $viber );

}

function add_user($connection, $nic, $fn, $ln, $pw, $phn, $eml, $vbr)
{
    $query  = "INSERT INTO USERS (`USER_NIC`, `USRE_F_NAME`, `USER_L_NAME`, `PASSWORD`, `CELL_PHONE`, `E_MAIL`, `VIBER`) VALUES('$nic','$fn', '$ln', '$pw', '$phn', '$eml', '$vbr')";
    echo $query;
    $result = $connection->query($query);

    if (!$result) die($connection->error);
}

?>