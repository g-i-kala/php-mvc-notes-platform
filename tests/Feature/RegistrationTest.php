<?php

declare(strict_types=1);

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

    // Check if the correct redirect Location header is set
    expect(headers_sent())->toBeTrue();
    expect(headers_list())->toContain('Location: /dashboard');
});

it('shows error on invalid email', function () {
    $_POST = [
        'name' => 'Jane',
        'email' => 'not-an-email',
        'password' => 'password123',
    ];

    include __DIR__ . '/../../app/Http/Controllers/registration/store.php';

    // You might set $_SESSION['errors'] or something like that
    expect($_SESSION['errors'])->toHaveKey('email');
});
