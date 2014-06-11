<?php
set_time_limit(0);

require 'websocket.php';

function wsOnMessage($clientID, $message, $messageLength, $binary) {
	global $Server;
	$ip = long2ip( $Server->wsClients[$clientID][6] );

	if ($messageLength == 0) {
		$Server->wsClose($clientID);
		return;
	}

	if ( sizeof($Server->wsClients) == 1 )
		$Server->wsSend($clientID, "");
	else
		foreach ( $Server->wsClients as $id => $client )
			if ( $id != $clientID )
				$Server->wsSend($id,$message);
}

function wsOnOpen($clientID)
{
	global $Server;
	$ip = long2ip( $Server->wsClients[$clientID][6] );

	$Server->log( "" );

	foreach ( $Server->wsClients as $id => $client )
		if ( $id != $clientID )
			$Server->wsSend($id, "");
}

function wsOnClose($clientID, $status) {
	global $Server;
	$ip = long2ip( $Server->wsClients[$clientID][6] );

	$Server->log( "" );

	foreach ( $Server->wsClients as $id => $client )
		$Server->wsSend($id, "");
}

$Server = new PHPWebSocket();
$Server->bind('message', 'wsOnMessage');
$Server->bind('open', 'wsOnOpen');
$Server->bind('close', 'wsOnClose');
$Server->wsStartServer('115.28.169.16', 9300);

?>
