<?php 
$I = new AcceptanceTester($scenario);

$order = $I->getOrder();
//$order = 25;

$I->wait(2);

$I->seeInDatabase('wp_woocommerce_order_items', ['order_id' => $order ]);
