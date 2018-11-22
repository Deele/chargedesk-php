<?php
namespace ChargeDesk;

/**
 * ChargeDesk Request Error
 * For Error that has occurred as a result of an incorrect API request
 */
class RequestError extends Error {}
class_alias('ChargeDesk\RequestError', 'ChargeDesk_RequestError');
