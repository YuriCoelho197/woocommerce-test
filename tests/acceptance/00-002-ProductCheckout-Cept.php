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
$I->fillField('#billing_first_name', 'Lorem');
$I->fillField('#billing_last_name', 'Ipsum');
$I->fillField('#billing_company', 'Company');
$I->selectOption('Country / Region','Brazil');
$I->fillField('#billing_address_1', 'Address Lorem');
$I->fillField('#billing_city', 'Lorem City');
$I->selectOption('State / County','Minas Gerais');
$I->fillField('#billing_postcode', '11223344');
$I->fillField('#billing_phone', '11223344');
$I->fillField('#billing_email', 'teste@gmail.com');
$I->fillField('#billing_postcode', '11223344');


$I->wait(2);
$I->click([ 'id' => 'place_order']);

$I->wait(2);
$I->see('Order received');
