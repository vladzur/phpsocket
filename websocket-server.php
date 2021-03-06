<?php

use MyApp\Chat;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require_once __DIR__.'/vendor/autoload.php';

$wsServer = new WsServer(new Chat());
$httpServer = new HttpServer($wsServer);

$server = IoServer::factory($httpServer,6080, '0.0.0.0');

echo "WebSocket server is running and listen on port 6080\n";

$server->run();