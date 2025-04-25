<?php

declare(strict_types=1);

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$loggedInUserId = $_SESSION['user']['id'];

$notes = $db->query("select * from notes where user_id = {$loggedInUserId}")->get();

view('/notes/index.view.php', [
    'heading' => 'My notes',
    'notes'    => $notes,
]);
