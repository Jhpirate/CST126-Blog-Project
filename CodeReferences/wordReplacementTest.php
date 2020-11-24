<?php

$text = "Hello crazy world, its 2018";
$words = ['world', 'its'];

foreach ($words as $word) {
    $length = strlen($word);                    // length of the word you want to replace
    $star = str_repeat("*", $length);         // I build the new string ****
    $text = str_replace($word, $star, $text); // I replace the $word by the new string
}

echo $text;
echo "<br>";
