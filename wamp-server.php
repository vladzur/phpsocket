<?php

use MyApp\Wamp;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\Wamp\WampServer;
use Ratchet\WebSocket\WsServer;
use React\Socket\Server;

require_once __DIR__.'/vendor/autoload.php';

$loop   = React\EventLoop\Factory::create();
$wamp = new Wamp;

// Set up our WebSocket server for clients wanting real-time updates
$webSock = new Server($loop);
$webSock->listen(8080, '0.0.0.0'); // Binding to 0.0.0.0 means remotes can connect

$wampServer = new WampServer($wamp);
$wsServer = new WsServer($wampServer);
$httpServer = new HttpServer($wsServer);
$webServer = new IoServer($httpServer, $webSock);

echo "WAMP server is running and listen on port 8080\n";

$loop->run();