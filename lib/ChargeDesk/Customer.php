<?php
namespace ChargeDesk;

/**
 * ChargeDesk Customer Resource
 */
class Customer extends Resource {

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
	 * Deletes an existing Resource
	 * @param $key Resource key to delete
	 * @param string $api_key API key to use for this request
	 * @return Resource Resource matching the provided $key
	 */
	public static function delete($key, $data = array(), $api_key = null) {
		return self::_delete(get_class(), $key, $data, $api_key);
	}

    /**
     * Find one or more existing resources
     * @param array $data Fields to search for existing resources
     * @param string $api_key API key to use for this request
     * @return array of Resource Resource matching the provided $data array
     */
    public static function find($data = array(), $api_key = null) {
        return self::_get(get_class(), $data, $api_key);
    }

    /**
     * Gets a snapshot of the billing history for a customer.
     * @param array $data Fields to search for existing resources
     * @param string $api_key API key to use for this request
     * @return array of Resource Resource matching the provided $data array
     */
    public static function history($data = array(), $api_key = null) {
        return self::_request("array", "get", self::_buildPath(get_class(), "history"), $data, $api_key);
    }
}
class_alias('ChargeDesk\Customer', 'ChargeDesk_Customer');
