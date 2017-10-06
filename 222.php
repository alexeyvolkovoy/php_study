<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 8/25/17
 * Time: 3:51 PM
 */
$object = new User("Joe","passw");
print_r($object); echo "<br/>";



 $object->name = "Vasya";
$object->password = "Parolle";

print_r($object); echo "<br/>";
$object->save_user();

class User
{
    public $name, $password;

    function __construct($init_name, $init_password)
    {
        $this->name = $init_name;
        $this->password = $init_password;
    }

    function save_user()
    {
        echo "Save user data code type here";
    }
}