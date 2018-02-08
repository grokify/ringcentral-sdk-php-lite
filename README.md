RingCentral Lite SDK for PHP
============================

[![Scrutinizer Code Quality][scrutinizer-status-svg]][scrutinizer-status-link]
[![License][license-svg]][license-link]

This is an experimental, lightweight, minimal dependency RingCentral SDK for PHP.

Goals include:

1. Legacy PHP support: No namespace usage
1. Self-contained: No dependencies
1. Embedded support: Single file deployment

Please use the [official RingCentral PHP SDK](https://github.com/ringcentral/ringcentral-php) if possible.

## Quickstart

### Send an SMS

See [`examples/sms`](examples/sms) for working example.

```php
require_once('/path/to/ringcentrallite.php');

$rc = new RingCentralLite('myClientId', 'myClientSecret', RingCentralLite::RC_SERVER_SANDBOX);
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

### Create Webhook

See [`examples/webhook`](examples/webhook) for working example.

```php
$reqBody = array(
    'eventFilters' => array(
        '/restapi/v1.0/account/~/extension/~/message-store/instant?type=SMS',
        '/restapi/v1.0/subscription/~?threshold=86400&interval=3600'
    ),
    'deliveryMode'      => array(
        'transportType' => 'WebHook',
        'address'       => 'https://12345678.ngrok.io/hook.php'
    )
);

$resBody = $client->post('subscription', array('json' => $body));
```

## License

RingCentral Lite SDK for PHP is available under an MIT-style license. See the [`LICENSE`](LICENSE) file for details.

RingCentral Lite SDK for PHP &copy; 2015-2018 by John Wang

 [scrutinizer-status-svg]: https://scrutinizer-ci.com/g/grokify/ringcentral-sdk-php-lite/badges/quality-score.png?b=master
 [scrutinizer-status-link]: https://scrutinizer-ci.com/g/grokify/ringcentral-sdk-php-lite/?branch=master
 [license-svg]: https://img.shields.io/badge/license-MIT-blue.svg
 [license-link]: https://github.com/grokify/ringcentral-sdk-php-lite/blob/master/LICENSE.txt
 