<?php 
$I = new AcceptanceTester($scenario);

#$I->amOnPage('/wp-login.php?redirect_to=http%3A%2F%2Fwoocommerce-test.loc%2Fwp-admin%2Findex.php&reauth=1');
$I->amOnPage('/wp-admin');
$I->fillField('#user_login', 'admin');
$I->fillField('#user_pass', '123');
$I->click([ 'id' => 'wp-submit']);
$I->see('Painel');