<?php

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die;
}

function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function getGetParams($key)
{
    if (isset($_GET[$key])) {
        return htmlspecialchars(trim($_GET[$key]));
    }
    return null;
}

function redirectTo($path)
{
    header('Location: ' . $path);
    exit;
}

function getSecure($value, $condition, $callback)
{
    if (isset($value) && empty($value)) {
        $callback();
    }
    if (!empty($value)) {
        $isGood = $condition;
        if (!$isGood) {
            $callback();
        }
    }
}
