<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 10/7/17
 * Time: 5:08 PM
 */
$text = file_get_contents('http://gelenapavlenko.com', NULL, NULL, 0, 2048);
//if($text) echo html_entity_decode($text);
if($text) echo htmlspecialchars($text);  // віводит содержимое строки в спецсимволах. В итоге браузер не обрабатівает теги.
else echo "fail";