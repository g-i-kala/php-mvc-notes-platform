<?php

use Core\App;

$db = App::getContainer()->resolve('Core\Database');

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
'id' => $_POST['note_id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$result = $db->query("DELETE FROM notes WHERE id = :id", [
    'id' => $_POST['note_id'],
]);

//header("Location: /notes");

if (! $result) {
    // Error if delete not succesfull
} else {
    header("Location: /notes");
    exit();
}
