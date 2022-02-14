<?php 
$I = new AcceptanceTester($scenario);

$order = $I->getOrder();

$I->seeInDatabase('wp_wc_order_stats', ['order_id' => $order ]);
