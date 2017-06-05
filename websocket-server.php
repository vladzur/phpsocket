<?php

use MyApp\Chat;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require_once __DIR__.'/vendor/autoload.php';

$wsServer = new WsServer(new Chat());
$httpServer = new HttpServer($wsServer);

$server = IoServer::factory(
    $httpServer,
    6080
);

$server->run();