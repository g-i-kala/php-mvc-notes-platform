<?php

declare(strict_types=1);

use App\Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;
use Core\ValidationException;

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

try {
    $form = LoginForm::validate([
        'email' => $email,
        'password' => $password,
    ]);
} catch (ValidationException $exception) {

    Session::flash('errors', $exception->getErrors());
    Session::flash('old', [
        'email' => $exception->getOld()['email'],
    ]);

    return redirect('/login');
}



// $errors = [];

// $form = new LoginForm();

// $errors = $form->validate([
//     'email' => $email,
//     'password' => $password,
// ]);

// if (! $errors) {
//     Session::flash('errors', $form->getErrors());
//     return redirect('/login');
// }

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
