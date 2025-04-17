<?php

use App\Http\Forms\LoginForm;

$auth = new LoginForm();
$auth->logout();

header('Location: /');
exit();
