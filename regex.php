<?php


echo preg_match('/H.T/', "HaT"); // ->TRUE
echo "</br>";
echo preg_match('/H.T/', "HaaT");// -> False because the dot '.' designate only one single character
echo "</br>";
echo preg_match('/^e+/', "pak");
