<?php
/**
 * WhyTheCharge Product Handler
 */

class WhyTheCharge_Product extends WhyTheCharge_Resource {

	public static function create($data = array()) {
		return self::_update(get_class(), false, $data);
	}

	public static function retrieve($key) {
		return self::_find(get_class(), $key);
	}

	public static function update($key, $data = array()) {
		return self::_update(get_class(), $key, $data);
	}

	public static function find($data = array()) {
		return self::_find(get_class(), $data);
	}
}
?>