<?php 
$I = new AcceptanceTester($scenario);

$I->amOnPage('/wp-admin');
$I->fillField('#user_login', 'admin');
$I->fillField('#user_pass', '123');
$I->click([ 'id' => 'wp-submit']);
$I->see('Painel');

$I->amOnPage( '/wp-admin/post-new.php?post_type=product' );
$I->see( 'Add new product' );

$I->click( '#excerpt-html' );
$I->fillField( '#excerpt', 'Test Content Excerpt' );
$I->fillField( '#_regular_price', '20' );
$I->fillField( '#title', 'Produto Novo Teste' );
$I->click( '#content-html');
$I->fillField( '#content', 'Test Content' );

$I->click([ 'id' => 'publish']);
$I->see( 'Product published' );

$I->click( [ 'link' => 'View Product' ] );
$I->see( 'Produto Novo Teste' );
