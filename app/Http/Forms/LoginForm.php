<?php

namespace App\Http\Forms;

use Core\App;
use Core\Database;
use Core\Validator;

class LoginForm
{
    protected $errors = [];
    protected $user;

    public function attempt($email, $password)
    {
        $this->user = App::resolve(Database::class)
            ->query("SELECT * FROM users WHERE email = :email", [
            'email' => $email
        ])->find();

        if ($this->user) {
            if (password_verify($password, $this->user['password'])) {
                $this->login();

                return true;
            }
        }

        $this->errors['login'] = "Incorect credentials.";
        return false;

    }

    public function validate($attributes)
    {

        if (! Validator::email($attributes['email'])) {
            $this->errors['login'] = "Please enter a proper email addrees.";
        }

        if (! Validator::string($attributes['password'], 6, 254)) {
            $this->errors['login'] = "Password minimum 6 charakters is required.";
        }

        return empty($this->errors);
    }

    public function login()
    {

        $_SESSION['user'] = [
            'id' => $this->user['user_id'],
            'username' => $this->user['username'],
            'email' => $this->user['email']
        ];

        session_regenerate_id(true);

    }

    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
    }


    public function getErrors()
    {
        return $this->errors;
    }

    public function sanitize()
    {
        //
    }
}
