<?php
/**
 * Created by PhpStorm.
 * User: NTHanh
 * Date: 3/28/2016
 * Time: 10:05 PM
 */
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
    echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>