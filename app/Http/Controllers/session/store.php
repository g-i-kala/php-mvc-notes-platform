<?php

declare(strict_types=1);

use App\Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

$errors = [];

$form = new LoginForm();

$errors = $form->validate([
    'email' => $email,
    'password' => $password,
]);

if (! $errors) {
    Session::flash('errors', $form->getErrors());
    return redirect('/login');
}

$auth = new Authenticator();

if (! $auth->attempt($email, $password)) {

    Session::flash('errors', $auth->getErrors());
    Session::flash('old', [
        'email' => $email,
    ]);

    return redirect('/login');
}



if (! $auth->getErrors()) {

    redirect('/');

}
