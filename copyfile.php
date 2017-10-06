<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 8/25/17
 * Time: 6:41 PM
 */
copy('testfile.txt','testfile2.txt') or die("Copying impossible");
echo "Copying successful!";