<?php namespace Codeception\Module;

use Laracasts\TestDummy\Factory;

class FunctionalHelper extends \Codeception\Module
{
    public function signIn()
    {
        $email = 'foo@example.com';
        $username = 'foobar';
        $password = 'foo';

        $this->haveAnAccount(compact('username', 'email', 'password'));

        $I = $this->getModule('Laravel4');

        $I->amOnPage('/login');
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('Sign In');
    }

    /**
     * Create a test account
     *
     * @param array $overrides
     */
    public function haveAnAccount($overrides = [])
    {
        return $this->have('Larabook\Users\User', $overrides);
    }


    /**
     * @param $model
     * @param array $overrides
     */
    public function have($model, $overrides = [])
    {
        return Factory::create($model, $overrides);
    }


    /**
     * Post a test status
     *
     * @param array $overrides
     */
    public function postAStatus($body)
    {
        $I = $this->getModule('Laravel4');

        $I->fillField('body', $body);
        $I->click('Post Status');
    }
}