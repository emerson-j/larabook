<?php

$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('Go home');

$I->amOnPage('/register');
$I->click('.navbar-brand');
$I->seeCurrentUrlEquals('/');