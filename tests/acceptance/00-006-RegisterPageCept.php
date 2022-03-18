<?php 
use \Codeception\Util\Locator;

$I = new AcceptanceTester($scenario);

//Login
$I->amOnPage('/wp-admin');
$I->fillField('#user_login', 'admin');
$I->fillField('#user_pass', '123');
$I->click([ 'id' => 'wp-submit']);
$I->see('Painel');

//Criar Post
$I->amOnPage( '/wp-admin/post-new.php?post_type=page' );
$I->wait(2);
$I->see( 'Welcome to the block editor' );

$I->click( Locator::find( 'button', ['aria-label' => 'Close dialog']) );

$I->click( '.rich-text' );
$I->fillField( '.rich-text', 'Titulo Pagina Teste' );

$I->click( '.block-editor-block-list__layout' );
$I->fillField( '.block-editor-rich-text__editable', 'Lorem Content' );

$I->click([ 'class' => 'editor-post-publish-button__button']);
$I->wait(1);

$I->click([ 'class' => 'editor-post-publish-panel__header-publish-button']);

$I->wait(2);
$I->see( 'is now live.');

//Edição Post

$I->amOnPage( 'wp-admin/edit.php?post_type=page' );
$I->click(['link' => 'Titulo Pagina Teste']);

$I->click( '.rich-text' );
$I->fillField( '.rich-text', 'Titulo Teste Edição' );

$I->click( '.block-editor-block-list__layout' );
$I->fillField( '.block-editor-rich-text__editable', ' Edição' );

$I->click([ 'class' => 'editor-post-publish-button__button']);

$I->wait(2);

$I->see( 'Page updated.' );

