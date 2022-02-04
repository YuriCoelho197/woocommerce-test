<?php 
$I = new AcceptanceTester($scenario);

$I->seeInDatabase('wp_users', ['user_login' => 'admin']);

$I->amOnPage('/wp-admin');
$I->fillField('#user_login', 'admin');
$I->fillField('#user_pass', '123');
$I->click([ 'id' => 'wp-submit']);
$I->see('Painel');