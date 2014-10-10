<?php

function whereami($idx = 0, $print = true)
{
    $t = debug_backtrace();
    $out = "<div style=\"background:white;color:black;padding:1em\">At {$t[$idx]['file']}:{$t[$idx]['line']}</div>";
    if (!$print) {
        return $out;
    }
    echo $out;
}

function dd()
{
    echo '<div style="background:white;color:black;clear:both; margin-top:2em">';
    whereami(1);
    foreach (func_get_args() as $arg) {
        var_dump($arg);
    }
    echo '</div>';
    exit;
}

function pd()
{
    echo '<pre style="background:white;color:black;clear:both; margin-top:2em">';
    whereami(1);
    foreach (func_get_args() as $arg) {
        print_r($arg);
    }
    echo '</pre>';
    exit;
}



