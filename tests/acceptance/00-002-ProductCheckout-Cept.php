<?php 
$I = new AcceptanceTester($scenario);

$I->amOnPage('/product/product-name');
$I->click([ 'name' => 'add-to-cart']);
$I->see('Product Name” has been added to your cart.');
$I->click(['link' => 'View cart']);
$I->see('Cart');
$I->click(['link' => 'Proceed to checkout']);

$I->amOnPage('/checkout/');
$I->see('Checkout');
$I->fillField('#billing_first_name', 'Emanuel');
$I->fillField('#billing_last_name', 'Souza');
$I->fillField('#billing_company', 'Company');
$I->selectOption('Country / Region','Brazil');
$I->fillField('#billing_address_1', 'Rua M');
$I->fillField('#billing_city', 'Governador Valadares');
$I->selectOption('State / County','Minas Gerais');
$I->fillField('#billing_postcode', '35024480');
$I->fillField('#billing_phone', '3332713322');
$I->fillField('#billing_email', 'teste@gmail.com');
$I->fillField('#billing_postcode', '35024480');

$I->wait(2);
$I->click([ 'id' => 'place_order']);

$I->wait(2);
$I->see('Order received');
