<?php
/**
 * WhyTheCharge Simple PHP Library
 */

class WhyTheCharge_Request {

	public static function request($method, $path, $params) {
		$request = new WhyTheCharge_Request();
		return $request->requestRaw($method, $path, $params);
	}

	public function requestRaw($method, $path, $params) {
		$url = WhyTheCharge::$apiUrl."/v".WhyTheCharge::$apiVersion."/$path";
		list($curlInfo, $curlResponse) = $this->_curlRequest($method, $url, $params);
		return $this->_parseResponse($curlInfo, $curlResponse);
	}

	private function _parseResponse($curlInfo, $curlResponse) {
		$status_code = intval($curlInfo['http_code']);
		$responseJSON = json_decode($curlResponse, false, 10);
		if($status_code < 200 || $status_code > 299 || !$responseJSON || $responseJSON->error) {
			$this->_apiError($status_code, $curlResponse, $responseJSON);
		}
		return $responseJSON;
	}


	private function _curlRequest($method, $url, $params = array()) {
		$curlOptions = array();
		$curlOptions[CURLOPT_URL] = $url;
		$curlOptions[CURLOPT_HTTPAUTH] = CURLAUTH_BASIC;
		$curlOptions[CURLOPT_USERPWD] = WhyTheCharge::$secretKey.":";
		$curlOptions[CURLOPT_RETURNTRANSFER] = true;
		$curlOptions[CURLOPT_CONNECTTIMEOUT] = 30;
		$curlOptions[CURLOPT_TIMEOUT] = 90;

		if($method == "post") {
			$curlOptions[CURLOPT_POST] = 1;
			$curlOptions[CURLOPT_POSTFIELDS] = $this->_encode($params);
		}
		else if($method == "get") {
			if($params) {
				$curlOptions[CURLOPT_URL] = $url."?".$this->_encode($params);
			}
		}

		$ch = curl_init();
		curl_setopt_array($ch, $curlOptions);
		$curlResponse = curl_exec($ch);
		$curlInfo = curl_getinfo($ch);

		if(!$curlResponse) {
			$code = curl_errno($ch);
			$error = curl_error($ch);
			curl_close($ch);
			$this->_curlError($code, $error);
		}

		curl_close($ch);
		return array($curlInfo, $curlResponse);
	}

	private function _curlError($code, $error) {
		throw new WhyTheCharge_ConnectError("[code $code] $error");
	}

	private function _apiError($status_code, $curlResponse, $responseJSON) {
		$message = "There was an error talking to WhyTheCharge";
		$incorrectParameter = false;
		if($responseJSON && $responseJSON->error) {
			if($responseJSON->error->message) {
				$message = $responseJSON->error->message;
			}
			if($responseJSON->error->incorrect_parameter) {
				$incorrectParameter = $responseJSON->error->incorrect_parameter;
			}
		}

		throw new WhyTheCharge_RequestError($message, $status_code, $curlResponse, $responseJSON, $incorrectParameter);
	}

	private function _encode($params, $array_name = false) {
		if(!is_array($params)) {
			return $params;
		}

		$encoded = array();
		foreach($params as $name => $value) {
			if(is_array($value)) {
				$encoded[] = $this->_encode($value, $name);
			}
			else if($array_name) {
				$encoded[] = $array_name."[".urlencode($name)."]=".urlencode($value);
			}
			else {
				$encoded[] = urlencode($name)."=".urlencode($value);
			}
		}

		return implode("&", $encoded);
	}
}
?>