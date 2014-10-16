<?php

function whereami($depthto = 0, $depthfrom = false, $print = true)
{
    if (false === $depthfrom || $depthfrom < $depthto) {
        $depthfrom = $depthto;
    }
    
    $t = debug_backtrace();
    $depthfrom = min($depthfrom, sizeof($t));
    $out = "<div style=\"background:white;color:black;padding:1em\">\n";
    for ($idx = $depthfrom; $idx >= $depthto; $idx--) {
        $out .= "At {$t[$idx]['file']}:{$t[$idx]['line']}<br>\n";
    }
    $out .= '</div>';
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



