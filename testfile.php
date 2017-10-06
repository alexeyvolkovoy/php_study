<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 8/25/17
 * Time: 6:18 PM
 */
$fh = fopen('testfile.txt', 'w') or die("ERR Cant create file!");
$text = <<<_END
String 1
String 2
String 3

_END;

fwrite($fh, $text) or die("Cant write to file!");
fclose($fh);
echo "File writed successfull";
