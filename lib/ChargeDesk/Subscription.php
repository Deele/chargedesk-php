<?php

namespace ChargeDesk;

/**
 * ChargeDesk Subscription Handler
 *
 * @package ChargeDesk
 */
class Subscription extends Resource
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
     * @param string $key Resource key to retrieve
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
     * @param string $key Resource key to update
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
     * Cancel subscription
     * @param string $key Resource key to update
     * @param array $data Fields to update an existing resource with
     * @param string $api_key API key to use for this request
     * @return Resource Resource with updated fields
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function cancel($key, $data = array(), $api_key = null)
    {
        return self::_post(get_class(), array($key, "cancel"), $data, $api_key);
    }
}

class_alias('ChargeDesk\Subscription', 'ChargeDesk_Subscription');
