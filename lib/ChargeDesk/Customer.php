<?php

namespace ChargeDesk;

/**
 * ChargeDesk Customer Resource
 *
 * @package ChargeDesk
 */
class Customer extends Resource
{

    /**
     * Creates a new Resource
     * @param array $data Fields to create a new charge with
     * @param string $api_key API key to use for this request
     * @return Resource Created resource
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function create($data = array(), $api_key = null)
    {
        return self::_post(get_class(), false, $data, $api_key);
    }

    /**
     * Retrieves an existing Resource
     * @param $key Resource key to retrieve
     * @param string $api_key API key to use for this request
     * @return Resource Resource matching the provided $key
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function retrieve($key, $api_key = null)
    {
        return self::_get(get_class(), $key, $api_key);
    }

    /**
     * @param $key Resource key to update
     * @param array $data Fields to update an existing resource with
     * @param string $api_key API key to use for this request
     * @return Resource Resource with updated fields
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function update($key, $data = array(), $api_key = null)
    {
        return self::_post(get_class(), $key, $data, $api_key);
    }

    /**
     * Deletes an existing Resource
     * @param string $key Resource key to delete
     * @param array $data Payload of fields to update
     * @param string $api_key API key to use for this request
     * @return Resource Resource matching the provided $key
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function delete($key, $data = array(), $api_key = null)
    {
        return self::_delete(get_class(), $key, $data, $api_key);
    }

    /**
     * Find one or more existing resources
     * @param array $data Fields to search for existing resources
     * @param string $api_key API key to use for this request
     * @return array of Resource Resource matching the provided $data array
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function find($data = array(), $api_key = null)
    {
        return self::_get(get_class(), $data, $api_key);
    }

    /**
     * Gets a snapshot of the billing history for a customer.
     * @param array $data Fields to search for existing resources
     * @param string $api_key API key to use for this request
     * @return array of Resource Resource matching the provided $data array
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function history($data = array(), $api_key = null)
    {
        return self::_request("array", "get", self::_buildPath(get_class(), "history"), $data, $api_key);
    }
}

class_alias('ChargeDesk\Customer', 'ChargeDesk_Customer');
