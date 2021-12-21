<?php

use MuriloPerosa\SuperPowers\Url;

it('validates URLs', function () {
    $this->assertTrue(Url::isValid('https://google.com'));
    $this->assertTrue(Url::isValid('http://google.com'));
    $this->assertFalse(Url::isValid('google.com'));
    $this->assertTrue(Url::isValid('https://GOOGLE.com'));
    $this->assertTrue(Url::isValid('https://google.com?uid=abcdef&test=465'));
    $this->assertFalse(Url::isValid('https://google.com&uid=abcdef&test=465'));
    $this->assertTrue(Url::isValid('https://google.com#&uid=abcdef&test=465'));
});

it('gets URL params', function() {
    $url = 'https://google.com?param1=abc&param2=123';
    $this->assertEquals(Url::getParam($url, 'param1'), 'abc');
    $this->assertEquals(Url::getParam($url, 'param2'), '123');
    $this->assertEquals(Url::getParam($url, 'param3'), null);

    $url = 'google.com?param1=abc&param2=123';
    $this->assertEquals(Url::getParam($url, 'param1'), 'abc');
    $this->assertEquals(Url::getParam($url, 'param2'), '123');
    $this->assertEquals(Url::getParam($url, 'param3'), null);

    $url = 'https://google.com';
    $this->assertEquals(Url::getParam($url, 'param1'), null);
    $this->assertEquals(Url::getParam($url, 'param2'), null);
    $this->assertEquals(Url::getParam($url, 'param3'), null);
});


it('sets URL params', function() {
    $original = 'https://google.com';

    $url = Url::setParam($original, 'param1', 'abc');
    $this->assertEquals($url, 'https://google.com?param1=abc');

    $url = Url::setParam($url, 'param2', '123');
    $this->assertEquals($url, 'https://google.com?param1=abc&param2=123');
});