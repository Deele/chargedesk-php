<?php
/**
 * ChargeDesk Charge Resource
 * Create, Update, Retrieve and Find Charges on ChargeDesk
 */
class ChargeDesk_Charge extends ChargeDesk_Resource {

	/**
	 * Creates a new Resource
	 * @param array $data Fields to create a new charge with
	 * @param string $api_key API key to use for this request
	 * @return ChargeDesk_Resource Created resource
	 */
	public static function create($data = array(), $api_key = null) {
		return self::_update(get_class(), false, $data, $api_key);
	}

	/**
	 * Retrieves an existing Resource
	 * @param $key Resource key to retrieve
	 * @param string $api_key API key to use for this request
	 * @return ChargeDesk_Resource Resource matching the provided $key
	 */
	public static function retrieve($key, $api_key = null) {
		return self::_find(get_class(), $key, $api_key);
	}

	/**
	 * @param $key Resource key to update
	 * @param array $data Fields to update an existing resource with
	 * @param string $api_key API key to use for this request
	 * @return ChargeDesk_Resource Resource with updated fields
	 */
	public static function update($key, $data = array(), $api_key = null) {
		return self::_update(get_class(), $key, $data, $api_key);
	}

	/**
	 * Find one or more existing resources
	 * @param array $data Fields to search for existing resources
	 * @param string $api_key API key to use for this request
	 * @return array of ChargeDesk_Resource Resource matching the provided $data array
	 */
	public static function find($data = array(), $api_key = null) {
		return self::_find(get_class(), $data, $api_key);
	}
}
?>