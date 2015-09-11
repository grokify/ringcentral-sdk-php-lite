<?

require_once(__DIR__ . '/../src/ringcentrallite.php');

$credentials = json_decode(file_get_contents('./rc-credentials.json'), true);

$rc  = new RingCentralLite($credentials['appKey'], $credentials['appSecret'], $credentials['server']);
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