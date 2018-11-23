<?php
/**
 * ChargeDesk PHP Library
 * Creates class_aliases for old class names replaced by PSR-4 Namespaces
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'autoload.php');

if (version_compare(PHP_VERSION, '5.4.0', '<')) {
    throw new ChargeDesk_Error('PHP version >= 5.4.0 required');
}

class ChargeDesk {
    public static function requireDependencies() {
        $requiredExtensions = ['json', 'curl'];
        foreach ($requiredExtensions AS $ext) {
            if (!extension_loaded($ext)) {
                throw new ChargeDesk_Error('The ChargeDesk library requires the ' . $ext . ' extension.');
            }
        }
    }
}

ChargeDesk::requireDependencies();
