<?php
use \Codeception\Util\Locator;

class BasicsCest
{
	private $faker;

	public function __construct(){
		$this->faker = Faker\Factory::create('pt_BR');
	}
	// tests
	public function Login(AcceptanceTester $I)
	{
		$I->seeInDatabase('wp_users', ['user_login' => 'admin']);

		$I->loginAsAdmin();
		$I->amOnAdminPage('/');
		$I->see('Painel');
	}

	public function Checkout(AcceptanceTester $I)
	{
		$I->amOnPage('/product/product-name');
		$I->click([ 'name' => 'add-to-cart']);
		$I->see('Product Name” has been added to your cart.');
		$I->click(['link' => 'View cart']);
		$I->see('Cart');
		$I->click(['link' => 'Proceed to checkout']);

		$I->amOnPage('/checkout/');
		$I->see('Checkout');


		$I->fillField('#billing_first_name', $this->faker->firstName());
		$I->fillField('#billing_last_name', $this->faker->lastName);
		$I->fillField('#billing_company', $this->faker->company);
		$I->selectOption('Country / Region','Brazil');
		$I->fillField('#billing_address_1', $this->faker->streetAddress);
		$I->fillField('#billing_city', $this->faker->city);
		$I->selectOption('State / County',$this->faker->state);
		$I->fillField('#billing_postcode', $this->faker->postcode);
		$I->fillField('#billing_phone', $this->faker->phone);
		$I->fillField('#billing_email', $this->faker->email);


		$I->wait(2);
		$I->click([ 'id' => 'place_order']);

		$I->wait(2);
		$I->see('Order received');

		$order = $I->getOrder();
		$I->wait(2);
		$I->seeInDatabase( 'wp_woocommerce_order_items', [ 'order_id' => $order ] );
	}

	public function RegisterProduct(AcceptanceTester $I)
	{
		$I->loginAsAdmin();
		$I->amOnAdminPage('/');
		$I->see('Painel');

		$I->amOnPage( '/wp-admin/post-new.php?post_type=product' );
		$I->see( 'Add new product' );

		$title = 'Produto '. $this->faker->words(3, true);
		$I->click( '#excerpt-html' );
		$I->fillField( '#excerpt', $this->faker->paragraph(5, true) );
		$I->fillField( '#_regular_price', '20' );
		$I->fillField( '#title', $title );
		$I->click( '#content-html');
		$I->fillField( '#content', $this->faker->paragraph(5, true) );

		$I->wait(2);

		$I->click([ 'id' => 'publish']);
		$I->see( 'Product published' );

		$I->click( [ 'link' => 'View Product' ] );
		$I->see( $title );
	}

	public function RegisterPost(AcceptanceTester $I)
	{
		$I->loginAsAdmin();
		$I->amOnAdminPage('/');
		$I->see('Painel');

		//Criar Post
		$I->amOnPage( '/wp-admin/post-new.php' );
		$I->wait(2);

		$I->tryToClick( Locator::find( 'button', ['aria-label' => 'Close dialog']) );

		$title = $this->faker->words(3, true);
		$I->click( '.rich-text' );
		$I->fillField( '.rich-text', $title );

		$I->click( '.block-editor-block-list__layout' );
		$I->fillField( '.block-editor-rich-text__editable', $this->faker->paragraph(3, true) );

		$I->click([ 'class' => 'editor-post-publish-button__button']);
		$I->wait(1);

		$I->click([ 'class' => 'editor-post-publish-panel__header-publish-button']);

		$I->wait(2);
		$I->see( 'is now live.');

		//Edição Post

		$I->amOnPage( '/wp-admin/edit.php' );
		$I->click(['link' => $title]);

		$I->click( '.rich-text' );
		$I->fillField( '.rich-text', $this->faker->words(5, true) );

		$I->click( '.block-editor-block-list__layout' );
		$I->fillField( '.block-editor-rich-text__editable', $this->faker->paragraph(5, true) );

		$I->click([ 'class' => 'editor-post-publish-button__button']);

		$I->wait(2);

		$I->see( 'Post updated.' );

	}

	public function RegisterPage(AcceptanceTester $I)
	{
		$I->loginAsAdmin();
		$I->amOnAdminPage('/');
		$I->see('Painel');

		//Criar Página
		$I->amOnPage( '/wp-admin/post-new.php?post_type=page' );
		$I->wait(2);

		$I->tryToClick( Locator::find( 'button', ['aria-label' => 'Close dialog']) );

		$title = $this->faker->words(3, true);
		$I->click( '.rich-text' );
		$I->fillField( '.rich-text', $title );

		$I->click( '.block-editor-block-list__layout' );
		$I->fillField( '.block-editor-rich-text__editable', $this->faker->paragraph(5, true) );

		$I->click([ 'class' => 'editor-post-publish-button__button']);
		$I->wait(1);

		$I->click([ 'class' => 'editor-post-publish-panel__header-publish-button']);

		$I->wait(2);
		$I->see( 'is now live.');

		//Edição Página

		$I->amOnPage( 'wp-admin/edit.php?post_type=page' );
		$I->click(['link' => $title]);

		$I->click( '.rich-text' );
		$I->fillField( '.rich-text', $this->faker->words(5, true) );

		$I->click( '.block-editor-block-list__layout' );
		$I->fillField( '.block-editor-rich-text__editable', $this->faker->paragraph(5, true) );

		$I->click([ 'class' => 'editor-post-publish-button__button']);

		$I->wait(2);

		$I->see( 'Page updated.' );
	}
}
