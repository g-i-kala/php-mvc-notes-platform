<?php

use Core\Router;
use Core\Response;

function isUrl($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function dd($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    die();
}

function abort($code = 404)
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

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($viewName, $attributes = [])
{
    extract($attributes);
    require base_path("app/views/" . $viewName);
}

function redirect($path)
{
    header("Location: {$path}");
    exit();
}
