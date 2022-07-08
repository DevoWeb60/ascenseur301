<?php
function phoneForLink($phoneNumber)
{
    $phoneNumber = str_replace(' ', '', $phoneNumber);
    $newFormat = substr($phoneNumber, 1, strlen($phoneNumber));
    return $phoneNumber;
}

function dump($var, $bool = true)
{
    echo '<pre>';
    var_dump($var);
    echo "</pre>";
    if ($bool) {
        die();
    }
}
