<?php

class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }

    public function tryToLogin(FunctionalTester $I)
    {
        $I->amOnPage('/wp-admin');
        $I->fillField('#user_login', 'admin');
        $I->fillField('#user_pass', '123');
        $I->click([ 'id' => 'wp-submit']);
        $I->see('Painel');
    }
}
