<?php
/**
 * WhyTheCharge Singleton
 */

class WhyTheCharge {
	public static $secretKey;
	public static $apiUrl = 'https://api.whythecharge.com';
	public static $apiVersion = '1';

	public static function apiKey($key) {
		self::$secretKey = $key;
	}

	public static function apiUrl($url) {
		self::$apiUrl = $url;
	}

	public static function apiVersion($version) {
		self::$apiVersion = $version;
	}
}
?>