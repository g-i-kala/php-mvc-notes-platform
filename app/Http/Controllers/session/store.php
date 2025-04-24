<?php

declare(strict_types=1);

use App\Http\Forms\LoginForm;
use Core\Authenticator;

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

//try {
$form = LoginForm::validate([
    'email' => $email,
    'password' => $password,
]);

$signedIn = (new Authenticator())->attempt($email, $password);

if (! $signedIn) {

    $form->addError('login', 'Incorect credentials.')
    ->throw();

}

redirect('/');
