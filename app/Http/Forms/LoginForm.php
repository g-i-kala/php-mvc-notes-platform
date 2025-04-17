<?php

namespace App\Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($attributes)
    {

        if (! Validator::string($attributes['username'], 1, 254)) {
            $this->errors['username'] = "Username of not more than 50 charakters is required.";
        }

        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = "Please enter a proper email addrees.";
        }

        if (! Validator::string($attributes['password'], 6, 254)) {
            $this->errors['password'] = "Password minimum 6 charakters is required.";
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
