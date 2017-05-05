<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Chat;

require_once __DIR__.'/vendor/autoload.php';


$wsServer = new WsServer(new Chat());
$httpServer = new HttpServer($wsServer);

$server = IoServer::factory(
    $httpServer,
    8080
);

$server->run();