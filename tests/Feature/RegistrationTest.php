<?php

declare(strict_types=1);

define('TESTING', true);
define('BASE_PATH', dirname(__DIR__) . '/../');

beforeEach(function () {
    $_POST = [];
    $_SESSION = [];
    $errors = [];
    ob_start(); // capture output in case of headers or echo
});

afterEach(function () {
    ob_end_clean(); // clean output buffer
});


it('redirects if registration is successful', function () {
    $_POST = [
        'username' => 'Jane',
        'email' => 'jane@example.com',
        'password' => 'password123',
    ];

    include __DIR__ . '/../../app/Http/Controllers/registration/store.php';

    expect($GLOBALS['redirect_to'])->toBe('/dashboard');

});

it('renders the create.view.php with errors on invalid input', function () {
    $_POST = [
        'username' => 'Jane',
        'email' => 'not-an-email',
        'password' => 'password123',
    ];

    include __DIR__ . '/../../app/Http/Controllers/registration/store.php';

    expect($GLOBALS['viewRendered'])->toBe('registration/create.view.php');
    expect($GLOBALS['viewData'])->toHaveKey('errors');
});
