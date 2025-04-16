<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = "Please enter a proper email addrees.";
}

if (! Validator::string($password)) {
    $errors['password'] = "Password minimum 6 charakters is required.";
}

if (! empty($errors)) {
    return view('/session/create.view.php', [
        'heading' => 'Login',
        'errors'  => $errors,
    ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if (! $user || ! password_verify($password, $user['password'])) {
    $errors['login'] = "Incorect credentials.";
    view('session/login.view.php', [
        'heading' => 'Login',
        'errors' => $errors
    ]);
}

if (! $errors) {

    login($user);

    header("Location: /dashboard");
    exit();

}
