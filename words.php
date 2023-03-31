<?php

function convert($word)
{
    $chars_from = array('а', 'в', 'с', 'е', 'н', 'к', 'м', 'о', 'р', 'т', 'з', 'у');
    $chars_to = array('A', 'B', 'C', 'E', 'H', 'K', 'M', 'O', 'P', 'T', '3', 'Y');

    return str_replace($chars_from, $chars_to, $word);
}

$words = array_map('trim', file('russian.txt'));
$preps = array('в', 'за', 'к', 'на', 'о', 'от', 'с', 'у');

foreach ($words as $word) {
    if (mb_strlen($word) <= 8 && !preg_match('/[^авсенкмортзу]/', $word)) {
        print $word . '(' . convert($word) . ')' . PHP_EOL;
        /*foreach ($preps as $prep) {
            if (mb_strlen($prep . ' ' . $word) <= 8) {
                print $prep . ' ' . $word . '(' . convert($prep . ' ' . $word) . ')' . PHP_EOL;
            } else if (mb_strlen($prep . $word) <= 8) {
                print $prep . $word . '(' . convert($prep . $word) . ')' . PHP_EOL;
            }
        }*/
    }
}
