<?php
/**
 * Bootstrap WhyTheCharge loading
 * Does not use autoloader for PHP 5.2 compatibility
 */
class WhyTheCharge_Loader {
	private $folder = "WhyTheCharge";
	private $files = array(
		// Core singleton
		"WhyTheCharge",
		// Model classes
		"WhyTheCharge_Resource",
		"WhyTheCharge_Charge",
		"WhyTheCharge_Customer",
		"WhyTheCharge_Product",
		"WhyTheCharge_Subscription",
		"WhyTheCharge_Ticket",
		// Errors
		"WhyTheCharge_Error",
		"WhyTheCharge_ConnectError",
		"WhyTheCharge_RequestError",
		// Utilities
		"WhyTheCharge_Request",
	);

	public function build() {
		foreach($this->files as $file) {
			require(dirname(__FILE__)."/".$this->folder."/".$file.".php");
		}
	}
}

// Include all files
$loader = new WhyTheCharge_Loader();
$loader->build();
?>