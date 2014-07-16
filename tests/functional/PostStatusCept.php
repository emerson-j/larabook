<?php

$I = new FunctionalTester($scenario);
$I->am('A Larabook member');
$I->wantTo('Post a status to my profile.');

$I->signIn();

$I->amOnPage('statuses');
$I->postAStatus('My first post!');

$I->seeCurrentUrlEquals('/statuses');
$I->see('My first post!');