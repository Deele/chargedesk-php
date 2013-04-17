<?php
/**
 * WhyTheCharge Error Container
 * Extended by all Errors and provided common functionality
 */
class WhyTheCharge_Error extends Exception {

	/**
	 * @param bool $message Error message
	 * @param int $statusCode HTTP Status code from API response
	 * @param string $response Full HTTP Response data
	 * @param mixed $responseObject Response data decoded into object format
	 * @param string $incorrectParameter Request parameter which triggered this error
	 */
	public function __construct($message = false, $statusCode = 0, $response = "", $responseObject = null, $incorrectParameter = "") {
		parent::__construct($message);

		$this->statusCode = $statusCode;
		$this->response = $response;
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
	 * @return string Full HTTP Response data (if applicable)
	 */
	public function getResponse() {
		return $this->response;
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
?>