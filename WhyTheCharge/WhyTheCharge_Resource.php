<?php
/**
 * WhyTheCharge Generic Error Handler
 */

class WhyTheCharge_Resource {

	/**
	 * Perform an update (or create) API request
	 * @param $class Class of calling resource
	 * @param bool $key Optional identifier of resource to update
	 * @param array $data Payload of fields to update
	 * @return mixed Object of type $class that has been updated or created
	 */
	public static function _update($class, $key = false, $data = array()) {
		return self::_request($class, "post", self::_buildPath($class, $key), $data);
	}

	/**
	 * Perform a lookup (find or retrieve) API request
	 * @param $class Class of calling resource
	 * @param array $data Payload of lookup request
	 * @return mixed Object of type $class
	 */
	public static function _find($class, $data = array()) {
		if(is_string($data) || is_integer($data)) {
			return self::_request($class, "get", self::_buildPath($class, $data));
		}
		return self::_request($class, "get", self::_buildPath($class), $data);
	}

	/**
	 * Converts a Resource class to its api path
	 * @param $class Class to convert
	 * @param bool $key Optionally an identifier to specific resource
	 * @return string relative api path to resource
	 */
	public static function _buildPath($class, $key = false) {
		$path = str_ireplace("WhyTheCharge_", "", $class);
		return strtolower($path)."s".($key ? "/".urlencode($key) : "");
	}

	/**
	 * Perform a WTC API request and return the resulting Resource
	 * @param $class Class of resource to request
	 * @param $method HTTP request method
	 * @param $path Relative api request path
	 * @param array $data Request payload
	 * @return mixed Object of type $class
	 */
	public static function _request($class, $method, $path, $data = array()) {
		$response = WhyTheCharge_Request::request($method, $path, $data);
		return self::_buildResource($class, $response);
	}

	/**
	 * Given an API response, build the Resource
	 * @param $class Class of calling resource
	 * @param $response API Response in stdClass form
	 * @return mixed Resource of type $class
	 */
	public static function _buildResource($class, $response) {
		$obj = new $class;
		foreach($response as $name => $value) {
			$obj->$name = $value;
		}
		return $obj;
	}
}
?>