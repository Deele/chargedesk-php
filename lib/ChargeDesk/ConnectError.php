<?php

namespace ChargeDesk;

/**
 * ChargeDesk Connection Error
 * Holds errors that occur while connecting to the ChargeDesk API
 *
 * @package ChargeDesk
 */
class ConnectError extends Error
{
}

class_alias('ChargeDesk\ConnectError', 'ChargeDesk_ConnectError');
