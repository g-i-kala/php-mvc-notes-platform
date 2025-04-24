<?php

declare(strict_types=1);

namespace App\Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];
    protected $user;
    protected $instance;

    public function __construct(private array $attributes)
    {
        if (! Validator::email($this->attributes['email'])) {
            $this->errors['login'] = "Please enter a proper email addrees.";
        }

        if (! Validator::string($this->attributes['password'], 6, 254)) {
            $this->errors['login'] = "Password minimum 6 charakters is required.";
        }
    }

    public static function validate($attributes)
    {
        $instance = new self($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        return ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function addError($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }

    public function sanitize()
    {
        //
    }

    public function valid(): bool
    {
        return ! $this->failed();
    }
}
