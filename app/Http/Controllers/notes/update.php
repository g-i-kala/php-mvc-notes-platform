<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

// find the note

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
'id' => $_POST['note_id']])->findOrFail();

// authorize
$currentUserId = 1;
authorize($note['user_id'] === $currentUserId);

// validate
$errors = [];

if (! Validator::string($_POST['title'], 1, 250)) {
    $errors['title'] = "Title of not more than 250 charakters is required.";
}

if (! Validator::string($_POST['content'], 1, 5000)) {
    $errors['content'] = "Content of not more than 5000 charakters is required.";
}

if (! empty($errors)) {
    return view('/notes/create.view.php', [
        'heading' => 'Edit Note',
        'errors'  => $errors,
        'note'  => $note,
    ]);

}

//if no errors -> update
$db->query("UPDATE notes SET title = :title, content = :content WHERE id = :id", [
    'id' => $_POST['note_id'],
    'title' => $_POST['title'],
    'content' => $_POST['content'],
]);

header("Location: /notes");
exit();
