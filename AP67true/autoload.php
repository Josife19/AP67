<?php

spl_autoload_register(function (string $class): void {
    $paths = [__DIR__ . '/controllers/', __DIR__ . '/models/'];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (is_file($file)) {
            require_once $file;
            return;
        }
    }
});

