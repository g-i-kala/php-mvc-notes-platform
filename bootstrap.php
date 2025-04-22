<?php

declare(strict_types=1);

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function () {
    return new Database();
});

$db = $container->resolve('Core\Database');

App::setContainer($container);
