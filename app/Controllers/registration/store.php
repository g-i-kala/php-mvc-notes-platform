<?php

use Core\App;
use Core\Database;
use Core\Validator;

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::string($username, 1, 254)) {
    $errors['username'] = "Username of not more than 50 charakters is required.";
}

if (! Validator::email($email)) {
    $errors['email'] = "Please enter a proper email addrees.";
}

if (! Validator::string($password, 6, 254)) {
    $errors['password'] = "Password minimum 6 charakters is required.";
}

if (! empty($errors)) {
    return view('/registration/create.view.php', [
        'heading' => 'Register',
        'errors'  => $errors,
    ]);
}

// check if unique
$db = App::resolve(Database::class);
$user = $db->query("SELECT * FROM users WHERE username = :username OR email = :email", [
    'username' => $username,
    'email' => $email
])->find();

if ($user) {

    if ($user['username'] === $username) {
        $errors['username'] = 'Username already taken.';
    } else {
        $errors['email'] = 'Email already taken.';
    }

    return view('/registration/create.view.php', [
        'heading' => 'Register',
        'errors'  => $errors,
    ]);
} else {
    $db->query("INSERT INTO users(username, email, password) VALUES (:username, :email, :password)", [
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $_SESSION['user'] = [
        'username' => $username,
        'email' => $email
    ];

    header("Location: /dashboard");
    exit();
}

// yes redurect
// no create to databes -> log -> riderect
