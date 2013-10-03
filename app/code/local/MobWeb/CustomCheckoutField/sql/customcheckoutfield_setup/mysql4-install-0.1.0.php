<?php

$installer = $this;
$installer->startSetup();

$installer->addAttribute(
	'quote', // An order is a "quote" while it's in the cart
	'custom_checkout_field', array(
		'type' => 'text',
		'label' => 'My Custom Checkout Field',
		'required' => 0
	)
);

$installer->addAttribute(
	'order',
	'custom_checkout_field', array(
		'type' => 'text',
		'label' => 'My Custom Checkout Field',
		'required' => 0
	)
);

$installer->endSetup();