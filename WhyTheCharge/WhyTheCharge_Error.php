<?php
/**
 * WhyTheCharge Generic Error Handler
 */

class WhyTheCharge_Error extends Exception {

	public function __construct($message = false, $statusCode = false, $response = false, $responseJSON = false, $incorrectParameter = false) {
		parent::__construct($message);

		$this->statusCode = $statusCode;
		$this->response = $response;
		$this->responseJSON = $responseJSON;
		$this->incorrectParameter = $incorrectParameter;
	}

	public function getHttpStatusCode() {
		return $this->statusCode;
	}

	public function getResponse() {
		return $this->response;
	}

	public function getResponseJSON() {
		return $this->responseJSON;
	}

	public function getIncorrectParameter() {
		return $this->incorrectParameter;
	}
}
?>