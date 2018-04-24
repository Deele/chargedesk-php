ChargeDesk PHP Library Overview
====================

This library has been built to make it easy to build on top of the ChargeDesk API with PHP!


Environment requirements
---------------------

This library supports all versions of PHP 5.2 and above.
It requires PHP to be complied with curl installed. Most PHP installations will have curl included.


Example code
---------------------

    // Include this library using the bootstrap.php file
    include_once 'chargedesk-php/bootstrap.php';

    // Setup your api key, so we know who you are
    ChargeDesk::apiKey("replace this text with your secret key");

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


Error handling
---------------------

The ChargeDesk API is rate limited (https://chargedesk.com/api-docs/php#information-rate-limiting). The  following code is an example of how to handle these rate limits gracefully.

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
    



You're ready to run
---------------------

That's it! You can find more code examples of individual API calls at https://chargedesk.com/api-docs/php

Issues and pull requests are most welcome :)