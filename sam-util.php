<?php

ini_set('xdebug.var_display_max_depth', 10);
ini_set('xdebug.var_display_max_data', 4096);

function whereami($depthto = 0, $depthfrom = false, $print = true)
{
    if (false === $depthfrom) {
        $depthfrom = 100;
    }

    if ($depthfrom < $depthto) {
        $depthfrom = $depthto;
    }

    $t = debug_backtrace();
    $depthfrom = min($depthfrom, sizeof($t));
    $out = "<div style=\"background:white;color:black;padding:1em\">\n";
    for ($idx = $depthfrom; $idx >= $depthto; $idx--) {
        if (!isset($t[$idx]) || !isset($t[$idx]['file']) || !isset($t[$idx]['line'])) {
            continue;
        }
        $out .= "At {$t[$idx]['file']}:{$t[$idx]['line']}<br>\n";
    }
    $out .= '</div>';
    if (!$print) {
        return $out;
    }

    if (php_sapi_name() == 'cli') {
        $out = strip_tags($out);
    }

    echo $out;
}

function sdd()
{
    if (function_exists('dd')) {
        whereami(1, 1);
        call_user_func('dd', func_get_args());
    }

    $out = '<div style="background:white;color:black;clear:both; margin-top:2em">'."\n";
    whereami(1,1);
    ob_start();
    foreach (func_get_args() as $arg) {
        var_dump($arg);
    }
    $out .= ob_get_clean() . "</div>\n";

    if (php_sapi_name() == 'cli') {
        $out = strip_tags($out);
    }

    echo $out;
    exit;
}

function pd()
{
    $out = '<pre style="background:white;color:black;clear:both; margin-top:2em">'."\n";
    whereami(1,1);
    foreach (func_get_args() as $arg) {
        $out .= print_r($arg, true) . "\n";
    }
    $out .= '</pre>'."\n";
    if (php_sapi_name() == 'cli') {
        $out = strip_tags($out);
    }
    echo $out;
    exit;
}
