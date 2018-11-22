<?php
/**
 * ChargeDesk Singleton
 * This class provides an easy way to globally update common variables.
 */
class ChargeDesk {
	public static $secretKey;
	public static $apiUrl = 'https://api.chargedesk.com';
	public static $apiVersion = '1';
	public static $verifySSL = true;
	public static $headers = [];

	/*
	 * Set the default secret key used for future calls
	 */
	public static function apiKey($key) {
		self::$secretKey = $key;
		self::resetHeaders();
	}

	/*
	 * Set the endpoint URL. Normally does not need to be set.
	 */
	public static function apiUrl($url) {
		self::$apiUrl = $url;
	}

	/*
	 * Set the API version to make calls against. Normally does not need to be set.
	 */
	public static function apiVersion($version) {
		self::$apiVersion = $version;
	}

	/*
	 * Set the API version to make calls against. Normally does not need to be set.
	 */
	public static function verifySSL($verify) {
		self::$verifySSL = $verify;
	}

	/*
	 * Clears any headers which have been set
	 */
	public static function resetHeaders() {
		self::$headers = [];
	}

	/*
	 * Adds a header to all requests
	 */
	public static function addHeader($header) {
		self::$headers[] = $header;
	}
}
?>