<?php

declare(strict_types=1);

use Core\Database;

// tests/NotesTest.php

it('shows the notes that belong to the logged in user', function () {

    // Fake logged-in user
    $_SESSION['user'] = [
        'id' => 1,
        'username' => 'tester',
    ];

    // Step 1: Create a mock database class
    $mockDb = new class {
        public function query($query, $params = [])
        {
            return new class {
                public function find()
                {
                    return null; // or return a mocked user
                }

                public function get()
                {
                    return [
                        ['title' => 'Mock Note', 'content' => 'This is a note'],
                    ]; // or [] to simulate no notes
                }
            };
        }
    };

    // Step 2: Bind mock into container
    \Core\App::bind(Database::class, fn() => $mockDb);

    // Run the controller
    include __DIR__ . '/../../app/Http/Controllers/Notes/index.php';

    // Assert view rendered with correct notes
    expect($GLOBALS['viewRendered'])->toBe('/notes/index.view.php');
    expect($GLOBALS['viewData']['notes'])->toHaveCount(1);
    expect($GLOBALS['viewData']['notes'][0]['title'])->toBe('Mock Note');
});
