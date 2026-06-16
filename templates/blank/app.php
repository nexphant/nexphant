<?php

require __DIR__ . '/vendor/autoload.php';

use Nexphant\App;
use Nexphant\Request;

$app = App::create();

$app->get('/', function (Request $request) {
    return [
        'name' => 'Nexphant',
        'status' => 'running',
    ];
});

$app->listen(
    host: $_ENV['APP_HOST'] ?? '0.0.0.0',
    port: (int) ($_ENV['APP_PORT'] ?? 8080),
);
