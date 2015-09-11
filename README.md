RingCentral Lite SDK for PHP
============================

This is an experimental, lightweight, minimal dependency RingCentral SDK for PHP.

Please use the [official RingCentral PHP SDK](https://github.com/ringcentral/ringcentral-php) if possible.

## Quickstart

### Send an SMS

```php
require_once(__DIR__ . '/path/to/ringcentrallite.php');

$credentials    =  array(
	'appKey'    => 'myAppKey',
	'appSecret' => 'myAppSecret',
	'username'  => 'myUsername', // RingCentral phone number
	'extension' => 'myExtension',
	'password'  => 'myPassword'
);

$rc = new RingCentralLite($credentials['appKey'], $credentials['appSecret'], RingCentralLite::RC_SERVER_SANDBOX);
$resAuth = $rc->authorize($credentials['username'], $credentials['extension'], $credentials['password']);

$params = array(
    'json'     => array(
        'to'   => array( array('phoneNumber' => '12223334444') ), // Text this number
        'from' => array('phoneNumber' => $credentials['username']), // From a valid RingCentral number
        'text' => 'SMS from RingCentral Lite PHP SDK'
    )
);
$resSms = $rc->post('account/~/extension/~/sms', $params);

```

## License

RingCentral Lite SDK for PHP is available under an MIT-style license. See the `LICENSE.txt` file for details.

RingCentral Lite SDK for PHP &copy; 2015 by John Wang