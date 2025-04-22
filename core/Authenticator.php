<?php

declare(strict_types=1);

namespace Core;

class Authenticator
{
    protected $errors = [];
    protected $user;

    public function attempt($email, $password)
    {
        $this->user = App::resolve(Database::class)
            ->query("SELECT * FROM users WHERE email = :email", [
                'email' => $email,
            ])->find();

        if ($this->user) {
            if (password_verify((string) $password, (string) $this->user['password'])) {
                $this->login();

                return true;
            }
        }

        $this->errors['login'] = "Incorect credentials.";
        return false;

    }

    public function login()
    {

        $_SESSION['user'] = [
            'id' => $this->user['user_id'],
            'username' => $this->user['username'],
            'email' => $this->user['email'],
        ];

        session_regenerate_id(true);

    }

    public function logout()
    {
        Session::destroy();
    }

    public function getErrors()
    {
        return $this->errors;
    }

}
