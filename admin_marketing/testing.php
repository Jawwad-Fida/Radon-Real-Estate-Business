<?php

$username = "rafi";

$keyLength = 4; 
$str = "1234567890abcdefghijklmnopqrstuvwxyz"; 
$shuffleStr = str_shuffle($str); 

$randStr = substr($shuffleStr, 0, $keyLength);
echo $randStr;
echo "<br>";

$new = $username.$randStr;
echo $new;

echo "<br>";
echo "<br>";

$keyLength = 5; 
$str = "1234567890abcdefghijklmnopqrstuvwxyz@_#*^%"; 
$shuffleStr = str_shuffle($str); 

$passStr = substr($shuffleStr, 0, $keyLength);
echo $passStr;

