<?php

declare(strict_types=1);

use Core\Response;

function isUrl($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function dd($variable): never
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    die();
}

function abort($code = 404): void
{
    http_response_code($code);

    $viewPath = base_path("app/views/{$code}.php");

    if (file_exists($viewPath)) {
        require_once $viewPath;
    } else {
        require_once base_path('app/views/500.php');
    }

    exit();
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (! $condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($viewName, $attributes = []): void
{
    extract($attributes);
    require base_path("app/views/" . $viewName);
}

function renderLoginView($errors)
{
    return view('session/login.view.php', [
        'heading' => 'Login',
        'errors' => $errors,
    ]);
}

function redirect($path): never
{
    header("Location: {$path}");
    exit();
}
