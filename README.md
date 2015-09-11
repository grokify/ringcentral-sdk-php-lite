RingCentral Lite SDK for PHP
============================

This is an experimental, lightweight, minimal dependency RingCentral SDK for PHP.

Goals include:

1. Legacy PHP support: No namespace usage
1. Embedded support: Single file deployment

Please use the [official RingCentral PHP SDK](https://github.com/ringcentral/ringcentral-php) if possible.

## Quickstart

### Send an SMS

```php
require_once('/path/to/ringcentrallite.php');

$rc = new RingCentralLite('myAppKey', 'myAppSecret', RingCentralLite::RC_SERVER_SANDBOX);
$resAuth = $rc->authorize('myUsername', 'myExtension', 'myPassword');

$params = array(
    'json'     => array(
        'to'   => array( array('phoneNumber' => '12223334444') ), // Text this number
        'from' => array('phoneNumber' => '12223335555'), // From a valid RingCentral number
        'text' => 'SMS from RingCentral Lite PHP SDK'
    )
);
$resSms = $rc->post('account/~/extension/~/sms', $params);

```

## License

RingCentral Lite SDK for PHP is available under an MIT-style license. See the `LICENSE.txt` file for details.

RingCentral Lite SDK for PHP &copy; 2015 by John Wang