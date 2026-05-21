<?php

use PeltonSolutions\FilamentCommon\Models\Tenant;

test('primary key is uuid', function () {
    expect((new Tenant())->getKeyName())->toBe('uuid');
});

test('does not use auto-incrementing', function () {
    expect((new Tenant())->getIncrementing())->toBeFalse();
});

test('key type is string', function () {
    expect((new Tenant())->getKeyType())->toBe('string');
});
