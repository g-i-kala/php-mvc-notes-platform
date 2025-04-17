<?php

namespace App\Http\Forms;

use Core\App;
use Core\Database;
use Core\Validator;

class LoginForm
{
    protected $errors = [];
    protected $user;

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

    public function getErrors()
    {
        return $this->errors;
    }

    public function sanitize()
    {
        //
    }
}
