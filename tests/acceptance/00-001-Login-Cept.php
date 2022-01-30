<?php 
$I = new AcceptanceTester($scenario);

$I->amOnPage('/wp-admin');
$I->fillField('#user_login', 'admin');
$I->fillField('#user_pass', '123');
$I->click([ 'id' => 'wp-submit']);
$I->see('Painel');