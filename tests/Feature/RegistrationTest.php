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
        'username' => 'Jane' . uniqid(),
        'email' => 'jane' . uniqid() . '@example.com',
        'password' => 'password123',
    ];

    include __DIR__ . '/../../app/Http/Controllers/registration/store.php';

    expect($GLOBALS['redirect_to'])->toBe('/dashboard');

});

it('redirects with errors on invalid input', function () {
    $_POST = [
        'username' => 'Jane',
        'email' => 'not-an-email',
        'password' => '1',
    ];

    include __DIR__ . '/../../app/Http/Controllers/registration/store.php';

    expect($GLOBALS['redirect_to'])->toBe('/register');
    expect($_SESSION['_flash']['errors'])->toBeArray();

});
