<?php

require __DIR__ . '/vendor/autoload.php';

use Nexphant\Reload;

Reload::run(
    command: 'php app.php',
    watch: [
        'app.php',
        'nexphant.dev.php',
        'composer.json',
        '.env',
        'app',
        'routes',
        'config',
        'resources',
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
