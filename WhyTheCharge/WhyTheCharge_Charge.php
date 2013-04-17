<?php
/**
 * WhyTheCharge Charge Resource
 * Create, Update, Retrieve and Find Charges on WhyTheCharge
 */
class WhyTheCharge_Charge extends WhyTheCharge_Resource {

	/**
	 * Creates a new Charge
	 * @param array $data Fields to create a new charge with
	 * @return WhyTheCharge_Charge Created charge
	 */
	public static function create($data = array()) {
		return self::_update(get_class(), false, $data);
	}

	/**
	 * Retrieves an existing Charge
	 * @param $key Charge key to retrieve
	 * @return WhyTheCharge_Charge Charge matching the provided $key
	 */
	public static function retrieve($key) {
		return self::_find(get_class(), $key);
	}

	/**
	 * @param $key Charge key to update
	 * @param array $data Fields to update an existing charge with
	 * @return WhyTheCharge_Charge Charge with updated fields
	 */
	public static function update($key, $data = array()) {
		return self::_update(get_class(), $key, $data);
	}

	/**
	 * Find one or more existing charges
	 * @param array $data Fields to search for existing charges
	 * @return array of WhyTheCharge_Charge Charges matching the provided $data array
	 */
	public static function find($data = array()) {
		return self::_find(get_class(), $data);
	}
}
?>