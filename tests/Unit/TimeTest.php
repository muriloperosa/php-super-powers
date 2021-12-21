<?php

use MuriloPerosa\SuperPowers\Time;

it('gets execution time', function () {
    $start = microtime(true);
    $execution_time = Time::executionTime($start);
    $this->assertEquals($execution_time, '00:00:00');
});
