<?php

declare(strict_types=1);

$root = __DIR__;

$templates = [
    'blank' => [
        'title' => 'Blank',
        'description' => 'Minimal Nexph app',
    ],
    'api' => [
        'title' => 'API',
        'description' => 'REST API starter',
    ],
    'mvc' => [
        'title' => 'MVC',
        'description' => 'Controller + view starter',
    ],
];

$colors = supportsColor();

$c = [
    'reset' => $colors ? "\033[0m" : '',
    'bold' => $colors ? "\033[1m" : '',
    'dim' => $colors ? "\033[2m" : '',
    'green' => $colors ? "\033[32m" : '',
    'cyan' => $colors ? "\033[36m" : '',
    'yellow' => $colors ? "\033[33m" : '',
    'red' => $colors ? "\033[31m" : '',
    'gray' => $colors ? "\033[90m" : '',
];

clearScreen();

line();
echo $c['cyan'] . $c['bold'];
echo " _   _                 _     \n";
echo "| \\ | | _____  ___ __ | |__  \n";
echo "|  \\| |/ _ \\ \\/ / '_ \\| '_ \\ \n";
echo "| |\\  |  __/>  <| |_) | | | |\n";
echo "|_| \\_|\\___/_/\\_\\ .__/|_| |_|\n";
echo "                 |_|         \n";
echo $c['reset'];
echo $c['dim'] . "Modern PHP Runtime & Framework for Stateful Applications." . $c['reset'] . PHP_EOL;
line();

echo PHP_EOL;
echo $c['bold'] . "Welcome to Nexph." . $c['reset'] . PHP_EOL;
echo $c['dim'] . "Choose a starter template to initialize your project." . $c['reset'] . PHP_EOL . PHP_EOL;

$template = chooseTemplate($templates, $c);

$source = $root . '/templates/' . $template;

if (!is_dir($source)) {
    error("Template directory not found: {$source}", $c);
    exit(1);
}

echo PHP_EOL;
step("Installing {$templates[$template]['title']} template", $c);
copyDirectory($source, $root);

step("Preparing environment", $c);
if (!file_exists($root . '/.env') && file_exists($root . '/.env.example')) {
    copy($root . '/.env.example', $root . '/.env');
}

step("Creating storage directories", $c);
@mkdir($root . '/storage', 0775, true);
@mkdir($root . '/storage/logs', 0775, true);
@mkdir($root . '/storage/cache', 0775, true);

if (file_exists($root . '/composer.json')) {
    step("Optimizing autoload", $c);
    passthru('composer dump-autoload -o');
}

if (getenv('NEXPH_KEEP_SETUP') !== '1') {
    step("Cleaning installer files", $c);
    removeDirectory($root . '/templates');
    @unlink($root . '/setup.php');
}

echo PHP_EOL;
success(strtoupper($template) . " template installed", $c);
success("Nexph project ready", $c);

echo PHP_EOL;
box([
    $c['bold'] . 'Next steps' . $c['reset'],
    '',
    $c['cyan'] . 'composer run dev' . $c['reset'],
    '',
    $c['dim'] . 'Your app will start with Nexph dev reload.' . $c['reset'],
], $c);

echo PHP_EOL;

function chooseTemplate(array $templates, array $c): string
{
    $keys = array_keys($templates);

    foreach ($keys as $index => $key) {
        $number = $index + 1;
        $title = $templates[$key]['title'];
        $description = $templates[$key]['description'];

        echo "  ";
        echo $c['cyan'] . "[$number]" . $c['reset'] . " ";
        echo $c['bold'] . str_pad($title, 8) . $c['reset'];
        echo $c['gray'] . $description . $c['reset'];
        echo PHP_EOL;
    }

    echo PHP_EOL;
    echo $c['yellow'] . "Template [blank]: " . $c['reset'];

    $input = trim(fgets(STDIN) ?: '');

    if ($input === '') {
        return 'blank';
    }

    if (ctype_digit($input)) {
        $selected = (int) $input - 1;

        if (isset($keys[$selected])) {
            return $keys[$selected];
        }
    }

    $input = strtolower($input);

    if (isset($templates[$input])) {
        return $input;
    }

    error("Unknown template: {$input}", $c);
    exit(1);
}

function copyDirectory(string $source, string $target): void
{
    $items = scandir($source);

    if ($items === false) {
        return;
    }

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $from = $source . '/' . $item;
        $to = $target . '/' . $item;

        if (is_dir($from)) {
            @mkdir($to, 0775, true);
            copyDirectory($from, $to);
            continue;
        }

        @mkdir(dirname($to), 0775, true);
        copy($from, $to);
    }
}

function line(): void
{
    echo "────────────────────────────────────────" . PHP_EOL;
}

function step(string $message, array $c): void
{
    echo $c['cyan'] . "→" . $c['reset'] . " {$message}" . PHP_EOL;
}

function success(string $message, array $c): void
{
    echo $c['green'] . "✓" . $c['reset'] . " {$message}" . PHP_EOL;
}

function error(string $message, array $c): void
{
    echo $c['red'] . "✕" . $c['reset'] . " {$message}" . PHP_EOL;
}

function box(array $lines, array $c): void
{
    $width = 44;

    echo $c['gray'] . "┌" . str_repeat("─", $width) . "┐" . $c['reset'] . PHP_EOL;

    foreach ($lines as $line) {
        $plain = stripAnsi($line);
        $padding = max(0, $width - mb_strlen($plain));

        echo $c['gray'] . "│" . $c['reset'];
        echo $line . str_repeat(" ", $padding);
        echo $c['gray'] . "│" . $c['reset'] . PHP_EOL;
    }

    echo $c['gray'] . "└" . str_repeat("─", $width) . "┘" . $c['reset'] . PHP_EOL;
}

function stripAnsi(string $text): string
{
    return preg_replace('/\033\[[0-9;]*m/', '', $text) ?? $text;
}

function clearScreen(): void
{
    if (PHP_SAPI === 'cli' && supportsColor()) {
        echo "\033[2J\033[H";
    }
}

function supportsColor(): bool
{
    if (DIRECTORY_SEPARATOR === '\\') {
        return false;
    }

    if (getenv('NO_COLOR') !== false) {
        return false;
    }

    return function_exists('posix_isatty')
        ? @posix_isatty(STDOUT)
        : true;
}

function removeDirectory(string $path): void
{
    if (!is_dir($path)) {
        return;
    }

    $items = scandir($path);

    if ($items === false) {
        return;
    }

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $target = $path . '/' . $item;

        if (is_dir($target)) {
            removeDirectory($target);
            continue;
        }

        @unlink($target);
    }

    @rmdir($path);
}