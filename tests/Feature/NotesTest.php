<?php

declare(strict_types=1);
// tests/NotesTest.php
use GuzzleHttp\Client;

it('loads the notes index page', function (): void {
    $client = new Client();
    $response = $client->get('http://nginx/notes');

    expect($response->getStatusCode())->toBe(200);
});
