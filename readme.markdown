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


You're ready to run
---------------------

That's it! You can find more code examples of individual API calls at https://www.chargedesk.com/api-docs/php

Issues and pull requests are most welcome :)