<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 8/25/17
 * Time: 8:40 PM
 */
$cmd = 'ls';
exec(escapeshellcmd($cmd),$output,$status);

if ($status) echo "Command noy executed";
else
{
 echo "<pre>";
 foreach($output as $line) echo htmlspecialchars("$line\n");
 echo "</pre>";
}