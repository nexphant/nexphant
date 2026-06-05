<?php

require __DIR__ . '/vendor/autoload.php';

use Nexph\Reload;

Reload::run(
    command: 'php app.php',
    watch: [
        'app.php',
        'nexph.dev.php',
        'composer.json',
        '.env',
        'app',
        'routes',
        'config',
    ],
    ignore: [
        'vendor',
        'storage',
        '.git',
        'node_modules',
        'public/build',
    ],
    root: __DIR__,
);
