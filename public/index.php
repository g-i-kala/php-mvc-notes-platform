<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

require __DIR__ . '/../vendor/autoload.php';
require base_path('bootstrap.php');

use Core\Router;
use Core\Session;

$router = new Router();

$routes = require base_path('routes/web.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();
