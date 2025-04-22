<?php

declare(strict_types=1);

use App\Http\Forms\RegisterForm;
use Core\App;
use Core\Database;

$username = htmlspecialchars((string) $_POST['username'], ENT_QUOTES, 'UTF-8');
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

$errors = [];

$form = new RegisterForm();

$errors = $form->validate([
    'username' => $username,
    'email'    => $email,
    'password' => $password,
]);


if (! $errors) {
    return view('/registration/create.view.php', [
        'heading' => 'Register',
        'errors'  => $form->getErrors(),
    ]);
}

// check if unique
$db = App::resolve(Database::class);
$user = $db->query("SELECT * FROM users WHERE username = :username OR email = :email", [
    'username' => $username,
    'email' => $email,
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
        'password' => password_hash((string) $password, PASSWORD_BCRYPT),
    ]);

    $_SESSION['user'] = [
        'username' => $username,
        'email' => $email,
    ];

    header("Location: /dashboard");
    exit();
}
