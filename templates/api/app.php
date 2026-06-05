<?php

require __DIR__ . '/vendor/autoload.php';

use Nexph\App;
use App\Controllers\ApiController;

$app = App::create();

$app->get('/', fn () => [
    'name' => 'Nexph API',
    'status' => 'running',
]);

$app->annotations([
    ApiController::class,
]);

$app->listen(
    host: $_ENV['APP_HOST'] ?? '0.0.0.0',
    port: (int) ($_ENV['APP_PORT'] ?? 8080),
);
