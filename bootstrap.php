<?php

use Core\App;
use Core\Database;
use Core\Container;

$container = new Container();

$container->bind('Core\Database', function () {
    return new Database();
});

$db = $container->resolve('Core\Database');

App::setContainer($container);
