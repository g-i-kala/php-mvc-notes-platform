<?php

declare(strict_types=1);

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/vendor/autoload.php';
require base_path('bootstrap.php');

use Core\Router;
use Core\Session;
use Core\ValidationException;

$router = new Router();

$routes = require base_path('routes/web.php');

$uri = parse_url((string) $_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {

    Session::flash('errors', $exception->getErrors());
    Session::flash('old', [
        'email' => $exception->getOld()['email'],
    ]);

    return redirect($router->previousUrl());
}

Session::unflash();
