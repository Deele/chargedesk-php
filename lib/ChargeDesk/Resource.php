<?php
namespace ChargeDesk;

/**
 * ChargeDesk Resource Holder
 * Is extended by all resources to provide common functions
 */
class Resource {

	/**
	 * Perform an update (or create) API request
	 * @param string $class Class of calling resource
	 * @param bool $key Optional identifier of resource to update
	 * @param array $data Payload of fields to update
	 * @param string $api_key API key to use for this request
	 * @return mixed Object of type $class that has been updated or created
	 */
	public static function _post($class, $key = false, $data = array(), $api_key = null) {
		return self::_request($class, "post", self::_buildPath($class, $key), $data, $api_key);
	}

	/**
	 * Perform a lookup (find or retrieve) API request
	 * @param string $class Class of calling resource
	 * @param array $data Payload of lookup request
	 * @param string $api_key API key to use for this request
	 * @return mixed Object of type $class
	 */
	public static function _get($class, $data = array(), $api_key = null) {
		if(is_string($data) || is_integer($data)) {
			return self::_request($class, "get", self::_buildPath($class, $data), array(), $api_key);
		}
		return self::_request($class, "get", self::_buildPath($class), $data, $api_key);
	}

	/**
	 * Perform a delete API request
	 * @param string $class Class of calling resource
	 * @param bool $key Optional identifier of resource to update
	 * @param array $data Payload of fields to update
	 * @param string $api_key API key to use for this request
	 * @return mixed Object of type $class that has been updated or created
	 */
	public static function _delete($class, $key = false, $data = array(), $api_key = null) {
		return self::_request($class, "delete", self::_buildPath($class, $key), $data, $api_key);
	}

	/**
	 * Converts a Resource class to its api path
	 * @param string $class Class to convert
	 * @param bool $key Optionally an identifier to specific resource
	 * @return string relative api path to resource
	 */
	public static function _buildPath($class, $key = false) {
		$path = str_ireplace("ChargeDesk_", "", $class);
		if($key && !is_array($key)) {
			$key = array($key);
		}
		return strtolower($path)."s".($key && isset($key[0]) ? "/".rawurlencode($key[0]) : "").($key && isset($key[1]) ? "/".rawurlencode($key[1]) : "");
	}

	/**
	 * Perform a WTC API request and return the resulting Resource
	 * @param string $class Class of resource to request
	 * @param string $method HTTP request method
	 * @param string $path Relative api request path
	 * @param array $data Request payload
	 * @param string $api_key API key to use for this request
	 * @return mixed Object of type $class
	 */
	public static function _request($class, $method, $path, $data = array(), $api_key = null) {
		$response = Request::request($method, $path, $data, $api_key);
		return self::_buildResource($class, $response);
	}

	/**
	 * Given an API response, build the Resource
	 * @param string $class Class of calling resource
	 * @param string $response API Response in stdClass form
	 * @return mixed Resource of type $class
	 */
	public static function _buildResource($class, $response) {
        if($class == "array") {
            return $response;
        }

		$obj = new $class;
		foreach($response as $name => $value) {
			$obj->$name = $value;
		}
		return $obj;
	}
}
class_alias('ChargeDesk\Resource', 'ChargeDesk_Resource');
