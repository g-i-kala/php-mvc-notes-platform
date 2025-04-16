<?php

namespace Core\Middleware;

class Auth
{
    public function handle()
    {
        if (! isset($_SESSION['user']) ?? false) {
            header("Location: /");
            exit();
        }
    }
}
