<?php

declare(strict_types=1);

use Core\Session;

view('session/login.view.php', [
    'heading' => 'Login',
    'errors' => Session::get('errors') ?? [],
]);
