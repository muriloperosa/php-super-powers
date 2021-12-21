<?php

use MuriloPerosa\SuperPowers\Data;

it('returns phone prefixes as array', function () {
    expect(Data::phonePrefixCodesWithCountry())->toBeArray();
});