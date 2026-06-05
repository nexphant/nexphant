<?php

return [
    'name' => $_ENV['APP_NAME'] ?? 'Nexph',
    'env' => $_ENV['APP_ENV'] ?? 'local',
    'debug' => filter_var($_ENV['APP_DEBUG'] ?? true, FILTER_VALIDATE_BOOL),
    'host' => $_ENV['APP_HOST'] ?? '0.0.0.0',
    'port' => (int) ($_ENV['APP_PORT'] ?? 8080),
];