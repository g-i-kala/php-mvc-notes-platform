<?php

$router->get('/', 'app/controllers/index.php');
$router->get('/about', 'app/controllers/about.php');
$router->get('/contact', 'app/controllers/contact.php');

$router->get('/notes', 'app/controllers/notes/index.php')->only('auth');
$router->get('/note', 'app/controllers/notes/show.php');
$router->delete('/note', 'app/controllers/notes/destroy.php');
$router->get('/notes/create', 'app/controllers/notes/create.php');
$router->post('/notes', 'app/controllers/notes/store.php');

$router->get('/note/edit', 'app/controllers/notes/edit.php');
$router->patch('/note', 'app/controllers/notes/update.php');

$router->get('/register', 'app/controllers/registration/create.php')->only('guest');
$router->post('/register', 'app/controllers/registration/store.php');

$router->get('/session', 'app/controllers/session/create.php')->only('guest');
$router->post('/session', 'app/controllers/session/store.php')->only('guest');
$router->delete('/session', 'app/controllers/session/destroy.php')->only('auth');

$router->get('/dashboard', 'app/views/dashboard.view.php')->only('auth');
