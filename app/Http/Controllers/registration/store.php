<?php

declare(strict_types=1);

use App\Http\Forms\RegisterForm;
use Core\App;
use Core\Database;
use Core\Session;

$username = htmlspecialchars((string) $_POST['username'], ENT_QUOTES, 'UTF-8');
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

$errors = [];

$form = new RegisterForm();

if (! $form->validate([
    'username' => $username,
    'email'    => $email,
    'password' => $password,
])) {
    $errors = $form->getErrors();

    Session::flash('errors', $form->getErrors());
    return redirect('/register');
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
        Session::flash('old', [
            'email' => $email,
        ]);
    } else {
        $errors['email'] = 'Email already taken.';
        Session::flash('old', [
            'username' => $username,
        ]);
    }

    Session::flash('errors', $errors);
    return redirect('/register');

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

    if (defined('TESTING')) {
        $GLOBALS['redirect_to'] = '/dashboard';
    } else {
        redirect('/');
    }
}
