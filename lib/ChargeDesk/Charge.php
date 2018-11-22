<?php
namespace ChargeDesk;

/**
 * ChargeDesk Charge Resource
 * Create, Update, Retrieve and Find Charges on ChargeDesk
 *
 * @package ChargeDesk
 */
class Charge extends Resource {

	/**
	 * Creates a new Resource
	 * @param array $data Fields to create a new charge with
	 * @param string $api_key API key to use for this request
	 * @return Resource Created resource
	 */
	public static function create($data = array(), $api_key = null) {
		return self::_post(get_class(), false, $data, $api_key);
	}

	/**
	 * Retrieves an existing Resource
	 * @param $key Resource key to retrieve
	 * @param string $api_key API key to use for this request
	 * @return Resource Resource matching the provided $key
	 */
	public static function retrieve($key, $api_key = null) {
		return self::_get(get_class(), $key, $api_key);
	}

	/**
	 * @param $key Resource key to update
	 * @param array $data Fields to update an existing resource with
	 * @param string $api_key API key to use for this request
	 * @return Resource Resource with updated fields
	 */
	public static function update($key, $data = array(), $api_key = null) {
		return self::_post(get_class(), $key, $data, $api_key);
	}

	/**
	 * Find one or more existing resources
	 * @param array $data Fields to search for existing resources
	 * @param string $api_key API key to use for this request
	 * @return array of ChargeDesk_Resource Resource matching the provided $data array
	 */
	public static function find($data = array(), $api_key = null) {
		return self::_get(get_class(), $data, $api_key);
	}

	/**
	 * Refund charge
	 * @param $key Resource key to update
	 * @param array $data Fields to update an existing resource with
	 * @param string $api_key API key to use for this request
	 * @return Resource Resource with updated fields
	 */
	public static function refund($key, $data = array(), $api_key = null) {
		return self::_post(get_class(), array($key, "refund"), $data, $api_key);
	}

	/**
	 * Send (or resend) email notification for this charge
	 * @param $key Resource key to update
	 * @param array $data Fields to update an existing resource with
	 * @param string $api_key API key to use for this request
	 * @return Resource Resource with updated fields
	 */
	public static function email($key, $data = array(), $api_key = null) {
		return self::_post(get_class(), array($key, "email"), $data, $api_key);
	}
}
class_alias('ChargeDesk\Charge', 'ChargeDesk_Charge');
