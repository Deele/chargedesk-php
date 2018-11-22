<?php
namespace ChargeDesk;

use Exception;

/**
 * ChargeDesk Error Container
 * Extended by all Errors and provided common functionality
 */
class Error extends Exception {

	/**
	 * @param bool $message Error message
	 * @param int $statusCode HTTP Status code from API response
	 * @param string $header Full HTTP Response header data
	 * @param string $response Full HTTP Response body data
	 * @param mixed $responseObject Response data decoded into object format
	 * @param string $incorrectParameter Request parameter which triggered this error
	 */
	public function __construct($message = false, $statusCode = 0, $header = "", $response = "", $headerArray = null, $responseObject = null, $incorrectParameter = "") {
		parent::__construct($message, $statusCode);

		$this->statusCode = $statusCode;
		$this->header = $header;
		$this->response = $response;
		$this->headerArray = $headerArray;
		$this->responseObject = $responseObject;
		$this->incorrectParameter = $incorrectParameter;
	}

	/**
	 * @return int HTTP Status code that caused this error (if applicable)
	 */
	public function getHttpStatusCode() {
		return $this->statusCode;
	}

	/**
	 * Get response header data
	 * @param $key Name of the header field to return (case insensitive)
	 * @return string Matching header field, Full HTTP Response header data (if $key is not set), null (if no header name matches $key)
	 */
	public function getHeader($key = null) {
		if(is_null($key)) {
			return $this->header;
		}
		foreach ($this->headerArray as $name => $val) {
			if(strtolower($key) == strtolower($name)) return $val;
		}
		return null;
	}

	/**
	 * @return string Full HTTP Response body data (if applicable)
	 */
	public function getResponse() {
		return $this->response;
	}

	/**
	 * @return mixed Parsed HTTP Response header data (if applicable)
	 */
	public function getHeaderArray() {
		return $this->headerArray;
	}

	/**
	 * @return mixed Response data decoded into object format (if applicable)
	 */
	public function getResponseObject() {
		return $this->responseObject;
	}

	/**
	 * @return string Request parameter which triggered this error
	 */
	public function getIncorrectParameter() {
		return $this->incorrectParameter;
	}
}
class_alias('ChargeDesk\Error', 'ChargeDesk_Error');
