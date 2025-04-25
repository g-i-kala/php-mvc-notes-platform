<?php

declare(strict_types=1);

it('validated a string', function () {
    $result = \Core\Validator::string('foobar');
    expect($result)->toBeTrue();

    // inline
    expect(\Core\Validator::string(false))->toBeFalse;
    expect(\Core\Validator::string(''))->toBeFalse;

});

it('validates a string with min lenght', function () {
    expect(\Core\Validator::string('foobar', 20))->toBeFalse;
    expect(\Core\Validator::string('foobar', 6))->toBeTrue;
});

it('validated an email', function () {
    expect(\Core\Validator::email('foobar'))->toBeFalse;
    expect(\Core\Validator::email('foo@bar.com'))->toBeTrue;

});
