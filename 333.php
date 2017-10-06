<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 8/25/17
 * Time: 11:43 AM
 */
$inputter=$_GET['inputter'];
$inputter2=$_GET['inputter2'];
$myname = "Dormidont";
$cur_date_text = longdate(time())."<br/>";
$ostatok_1 = (9%4)."<br/>";  // 1 ?
$ostatok_2 = (13%5)."<br/>"; // 3 ?
$otladka_string = "This is string ". __LINE__ ." in file ". __FILE__."<br/>";
$fragment_dlya_vstavki = $cur_date_text;
$fragment_dlya_vstavki.=$ostatok_1;
$fragment_dlya_vstavki.=$ostatok_2;
$fragment_dlya_vstavki.=$otladka_string;
if ($inputter == 2) {
    $fragment_dlya_vstavki .= "WOW! INPUTTER IS 2 <br/>";
}
if ($inputter == "yui") {
    $fragment_dlya_vstavki .= "YUI WOW RULES! <br/>";
}
if ($inputter2) {
    $fragment_dlya_vstavki .= arecycle($inputter2);
}

echo <<<_MYTEXTHTML
<html>
<head><title>Mypage</title></head>
<body><h1>Hello Alex Wolf</h1>
<p>Is full html $myname text</p></body>
<p>$fragment_dlya_vstavki</p>
</html>
_MYTEXTHTML;

/**
 * @param $timestamp
 * @return false|string
 */
function longdate($timestamp)
{
    return date("l Y F jS", $timestamp);
}
function arecycle($inputter2)
{
    while ($inputter2 >= 0) {
        $outstring .= "Circle " . $inputter2."<br/>";
        $inputter2--;
    }
    return $outstring;
}
