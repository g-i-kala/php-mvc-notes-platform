<?php

use App\Http\Forms\LoginForm;
use Core\Authenticator;

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

$errors = [];

$form = new LoginForm();

$errors = $form->validate([
    'email' => $email,
    'password' => $password
]);

if (! $errors) {
    return renderLoginView($form->getErrors());
}

$auth = new Authenticator();

if (! $auth->attempt($email, $password)) {

    return renderLoginView($auth->getErrors());
}

if (! $auth->getErrors()) {

    redirect('/');

}
