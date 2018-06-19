<?php

/**
 * To use this demo, use the `ENV_PATH` environment variable
 * to point to your .env file.
 */

require_once(__DIR__ . '/../../src/dotenv.php');
require_once(__DIR__ . '/../../src/ringcentrallite.php');

loadDotEnv($_ENV['ENV_PATH']);

$rc = new RingCentralLite(
    $_ENV['RINGCENTRAL_CLIENT_ID'],
    $_ENV['RINGCENTRAL_CLIENT_SECRET'],
    $_ENV['RINGCENTRAL_SERVER_URL']);

$res = $rc->authorize(
    $_ENV['RINGCENTRAL_USERNAME'],
    $_ENV['RINGCENTRAL_EXTENSION'],
    $_ENV['RINGCENTRAL_PASSWORD']);

$params = array(
    'json'     => array(
        'to'   => array( array('phoneNumber' => $_ENV['RINGCENTRAL_DEMO_SMS_TO']) ),
        'from' => array('phoneNumber' => $_ENV['RINGCENTRAL_USERNAME']),
        'text' => 'SMS from RingCentral Lite PHP SDK'
    )
);
$res = $rc->post('/restapi/v1.0/account/~/extension/~/sms', $params);

print_r($res);

echo "DONE\n";

?>