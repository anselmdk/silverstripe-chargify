<?php
/**
 * Links a member to a chargify page and subscription.
 *
 * @package silverstripe-chargify
 */
class ChargifySubscriptionLink extends DataObject {

	public static $db = array(
		'SubscriptionID' => 'Int'
	);

	public static $has_one = array(
		'Member'  => 'Member',
		'Page'    => 'ChargifySubscriptionPage'
	);

	public function onAfterWrite() {
		if ($this->isChanged('ID')) {
			$this->Member()->extend('onAfterChargifySubscriptionCreate', $this);
		}

		parent::onAfterWrite();
	}

}