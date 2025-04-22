<?php

declare(strict_types=1);
// tests/NotesTest.php
use GuzzleHttp\Client;

it('loads the notes index page', function () {
    $client = new Client();
    $response = $client->get('http://localhost:8000/notes');

    expect($response->getStatusCode())->toBe(200);
});
