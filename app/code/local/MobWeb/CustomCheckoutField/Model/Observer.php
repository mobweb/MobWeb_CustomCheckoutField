<?php

class MobWeb_CustomCheckoutField_Model_Observer
{
	// Before saving the quote, add the custom checkout field that was filled
	// out in the previous step to the quote, so that the custom field will
	// also be converted to the order as part of the quote
	public function salesQuoteSaveBefore( $observer )
	{
		// Check if the current observer was fired as part of the checkout
		// process and not somewhere else
		if( $this->_checkControllerAction( 'checkout', 'onepage', 'saveBilling' ) ) {
			// Get the custom field that was transmitted with the request
			// The last argument has to match the id/name of the actual field
			$custom_checkout_field = Mage::app()->getRequest()->getParam( 'customcheckoutfield' );

			// Save the custom field in the quote
			if( $custom_checkout_field ) {
				$observer->getEvent()->getQuote()->setCustomCheckoutField( $custom_checkout_field );
			}
		}
	}

	// This function checks if the currently executed controller action matches
	// the one passed as the function's arguments
	// (copied directly from the book)
	protected function _checkControllerAction( $module = null, $controller = null, $action = null )
	{
		$request = Mage::app()->getRequest();
		if (isset($module) && $request->getModuleName() != $module)
		{
			return false;
		}
		if (isset($controller) && $request->getControllerName() != $controller)
		{
			return false;
		}
		if (isset($action) && $request->getActionName() != $action)
		{
			return false;
		}
		return true;
	}
}