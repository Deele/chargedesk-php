<?php
/**
 * Bootstrap ChargeDesk loading
 * Does not use autoloader for PHP 5.2 compatibility
 */
class ChargeDesk_Loader {
	private $folder = "ChargeDesk";
	private $files = array(
		// Core singleton
		"ChargeDesk",
		// Model classes
		"ChargeDesk_Resource",
		"ChargeDesk_Charge",
		"ChargeDesk_Customer",
		"ChargeDesk_Product",
		"ChargeDesk_Subscription",
		"ChargeDesk_Ticket",
		// Errors
		"ChargeDesk_Error",
		"ChargeDesk_ConnectError",
		"ChargeDesk_RequestError",
		// Utilities
		"ChargeDesk_Request",
	);

	public function build() {
		foreach($this->files as $file) {
			require(dirname(__FILE__)."/".$this->folder."/".$file.".php");
		}
	}
}

// Include all files
$loader = new ChargeDesk_Loader();
$loader->build();
?>