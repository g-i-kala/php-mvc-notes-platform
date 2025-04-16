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

function login($user)
{

    $_SESSION['user'] = [
        'id' => $user['user_id'],
        'username' => $user['username'],
        'email' => $user['email']
    ];

    session_regenerate_id(true);

}

function logout()
{
    $_SESSION = [];
    session_unset();
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
}
