# ChargeDesk PHP Library

This library has been built to make it easy to build on top of the ChargeDesk API with PHP!

## Dependencies

PHP version >= 5.4.0 is required.

The following PHP extensions are required:

* curl
* json

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --dev --prefer-dist deele/chargedesk-php
```

or add

```
"deele/chargedesk-php": "*"
```

to the **require** section of your `composer.json` file and

```
{
    "type": "vcs",
    "url": "https://github.com/deele/chargedesk-php"
}
```

to the **repositories** section of your `composer.json` file


## Quick Start Example

```php
// Include this library using the bootstrap.php file
include_once 'chargedesk-php/bootstrap.php';

// Setup your api key, so we know who you are
ChargeDesk_Configuration::apiKey("replace this text with your secret key");

// Create a new charge in the system
$charge = ChargeDesk_Charge::create(array(
    "amount" =>     "49.00",
    "currency" =>   "USD",
    "customer" =>   array(
        "id" => "example@chargedesk.com"
    )
));
// $charge now contains the data from the charge you've just created

echo $charge->support_url; // Print out the individual support URL
```

Both PSR-0 and PSR-4 namespacing are supported. If you are using composer with `--classmap-authoritative` or
`--optimize-autoloader` enabled, you'll have to reference classes using PSR-4 namespacing:

```php
// Setup your api key, so we know who you are
ChargeDesk\Configuration::apiKey("replace this text with your secret key");

// Create a new charge in the system
$charge = ChargeDesk\Charge::create(array(
    "amount" =>     "49.00",
    "currency" =>   "USD",
    "customer" =>   array(
        "id" => "example@chargedesk.com"
    )
));
// $charge now contains the data from the charge you've just created

echo $charge->support_url; // Print out the individual support URL
```

## Error handling

The ChargeDesk API is rate limited (https://chargedesk.com/api-docs/php#information-rate-limiting). The  following code is an example of how to handle these rate limits gracefully.

```php
// Include this library using the bootstrap.php file
include_once 'chargedesk-php/bootstrap.php';

// Setup your api key, so we know who you are
ChargeDesk::apiKey("replace this text with your secret key");

// Example of running a large number of requests
$offset = 0;
while($offset < 40) {
    try {
        $charges = ChargeDesk_Charge::find(array(
            "count" => 1,
            "offset" => $offset,
        ));
        print $offset." - Charge ID: ".$charges->data[0]->charge_id."<br />";
        $offset++;
    }
    catch(ChargeDesk_RateLimitError $e) {
        // Wait for the specified time before trying the request again
        print "<b>Hit rate limit. Sleeping for ".$e->getHeader('Retry-After')." seconds</b><br />";
        sleep($e->getHeader('Retry-After'));
    }
}
```

_*You're ready to run*_

That's it! You can find more code examples of individual API calls documentation.

Issues and pull requests are most welcome :)


## Documentation

 * [Official documentation](https://chargedesk.com/api-docs/php)