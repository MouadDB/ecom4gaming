<?php

function loadFiles($class) {
    $path = __DIR__ . '/lib/';
    require_once $path . $class .'.php';
}

spl_autoload_register('loadFiles');
