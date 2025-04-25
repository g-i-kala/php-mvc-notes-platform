<?php

declare(strict_types=1);

use Core\Container;

test('it can resolve something out of the container', function (): void {
    // arrange
    $container = new Container();

    $container->bind('foo', fn() => 'bar');
    // act

    $result = $container->resolve('foo');
    // assert / expect

    expect($result)->toEqual('bar');
});
