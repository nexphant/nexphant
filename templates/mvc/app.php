<?php

require __DIR__ . '/vendor/autoload.php';

use Nexph\App;
use App\Controllers\HomeController;

$app = App::create();

$app->annotations([
    HomeController::class,
]);

$app->listen(
    host: $_ENV['APP_HOST'] ?? '0.0.0.0',
    port: (int) ($_ENV['APP_PORT'] ?? 8080),
);
