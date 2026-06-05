<?php

require __DIR__ . '/vendor/autoload.php';

use Nexph\App;
use Nexph\Request;

$app = App::create();

$app->get('/', function (Request $request) {
    return [
        'name' => 'Nexph',
        'status' => 'running',
    ];
});

$app->listen(
    host: $_ENV['APP_HOST'] ?? '0.0.0.0',
    port: (int) ($_ENV['APP_PORT'] ?? 8080),
);
