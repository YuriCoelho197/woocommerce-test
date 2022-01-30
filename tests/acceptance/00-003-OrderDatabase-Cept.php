<?php 
$I = new AcceptanceTester($scenario);

$I->seeRecord('wc_customer_lookup', ['email' => 'teste@gmail.com']);
