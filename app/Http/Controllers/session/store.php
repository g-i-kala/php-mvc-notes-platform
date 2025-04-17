<?php

use App\Http\Forms\LoginForm;
use Core\App;
use Core\Validator;

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

$errors = [];

$form = new LoginForm();

$errors = $form->validate([
    'email' => $email,
    'password' => $password
]);

if (! $errors) {
    return view('session/login.view.php', [
        'heading' => 'Login',
        'errors'  => $form->getErrors()
    ]);
}

if (! $form->attempt($email, $password)) {

    view('session/login.view.php', [
        'heading' => 'Login',
        'errors' => $form->getErrors()
    ]);
}


if (! $form->getErrors()) {

    $form->login();

    redirect('/');

}
