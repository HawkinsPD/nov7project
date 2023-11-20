<?php
spl_autoload_register(function($className) {
    $file = $className . '.php';

    if (file_exists($file)) {
        include $file;
    }
    elseif (file_exists('route/' . $file)) {
        include 'route/' . $file;
    }
    elseif (file_exists('database/' . $file)) {
        include 'database/' . $file;
    }
    elseif (file_exists('js/' . $file)) {
        include 'js/' . $file;
    }
});
