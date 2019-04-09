<?php

spl_autoload_register(function ($class) {
    $parts = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . $parts . '.php';

    if (!file_exists($filePath)) {
        throw new Exception(sprintf("Class %s not exist by %s path", $class, $filePath));
    }

    require_once($filePath);
});
