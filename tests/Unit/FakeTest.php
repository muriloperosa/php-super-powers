<?php

use MuriloPerosa\SuperPowers\Data;
use MuriloPerosa\SuperPowers\Fake;

it('generate random phone number', function () {

    $phone = Fake::phoneNumber();

    expect($phone)->toBeString();

    $parts = explode('-', $phone);
    expect(count($parts))->toBe(2);

    expect(array_key_exists($parts[0], Data::phonePrefixCodesWithCountry()))->toBeTrue();
    expect(strlen($parts[1]))->toBe(7);

    $phone2 = Fake::phoneNumber('%s#%s');

    expect($phone2)->toBeString();

    $parts2 = explode('#', $phone2);
    expect(count($parts2))->toBe(2);

    expect(array_key_exists($parts2[0], Data::phonePrefixCodesWithCountry()))->toBeTrue();
    expect(strlen($parts2[1]))->toBe(7);
});