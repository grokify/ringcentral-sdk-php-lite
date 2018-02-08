<?php

/**
 * To use this demo, copy rc-credentials-sample.json
 * to rc-credentials.json and populate with your actual
 * credentials
 */

require_once(__DIR__ . '/../../src/ringcentrallite.php');

$credentials = json_decode(file_get_contents('./rc-credentials.json'), true);

$rc  = new RingCentralLite($credentials['clientId'], $credentials['clientSecret'], RingCentralLite::RC_SERVER_SANDBOX);
$res = $rc->authorize($credentials['username'], $credentials['extension'], $credentials['password']);

$params = array(
    'json'     => array(
        'to'   => array( array('phoneNumber' => '17752204114') ),
        'from' => array('phoneNumber' => $credentials['username']),
        'text' => 'SMS from RingCentral Lite PHP SDK'
    )
);
$res2 = $rc->post('account/~/extension/~/sms', $params);

print_r($res2);

echo "DONE\n";

?>