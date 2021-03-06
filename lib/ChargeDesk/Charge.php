<?php

namespace ChargeDesk;

/**
 * ChargeDesk Charge Resource
 * Create, Update, Retrieve and Find Charges on ChargeDesk
 *
 * @package ChargeDesk
 */
class Charge extends Resource
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
     * @return array of ChargeDesk_Resource Resource matching the provided $data array
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function find($data = array(), $api_key = null)
    {
        return self::_get(get_class(), $data, $api_key);
    }

    /**
     * Refund charge
     * @param string $key Resource key to update
     * @param array $data Fields to update an existing resource with
     * @param string $api_key API key to use for this request
     * @return Resource Resource with updated fields
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function refund($key, $data = array(), $api_key = null)
    {
        return self::_post(get_class(), array($key, "refund"), $data, $api_key);
    }

    /**
     * Send (or resend) email notification for this charge
     * @param string $key Resource key to update
     * @param array $data Fields to update an existing resource with
     * @param string $api_key API key to use for this request
     * @return Resource Resource with updated fields
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function email($key, $data = array(), $api_key = null)
    {
        return self::_post(get_class(), array($key, "email"), $data, $api_key);
    }

    /**
     * Preview the subtotal, any tax rates and the final total amount for a charge or product.
     * @param array $data Fields to calculate preview from
     * @param string $api_key API key to use for this request
     * @return Resource Resource with updated fields
     * @throws ConnectError
     * @throws RateLimitError
     * @throws RequestError
     */
    public static function preview($data = array(), $api_key = null)
    {
        return self::_request(get_class(), "get", self::_buildPath(get_class(), 'preview'), $data, $api_key);
    }
}

class_alias('ChargeDesk\Charge', 'ChargeDesk_Charge');
