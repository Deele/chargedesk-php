<?php
namespace ChargeDesk;

/**
 * ChargeDesk Rate Limit Error
 * Holds errors that occur due to being rate limited
 */
class RateLimitError extends Error {}
class_alias('ChargeDesk\RateLimitError', 'ChargeDesk_RateLimitError');
