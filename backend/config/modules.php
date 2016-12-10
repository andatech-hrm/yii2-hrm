<?php
$moduleDir = realpath(__DIR__.'/modules');
$modules = [];
foreach (glob($moduleDir.'/*.php') as $filename) {
    $path_parts = pathinfo($filename);
    $modules[$path_parts['filename']] = require $filename;
}

return $modules;
?>
