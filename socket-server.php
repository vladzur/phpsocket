<?php
require_once __DIR__.'/vendor/autoload.php';

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);

$clients = new \SplObjectStorage();

$socket->on('connection', function ($connection) use ($clients) {
    $clients->attach($connection);

    $connection->on('data', function ($data) use ($clients, $connection) {
        foreach ($clients as $current) {
            if ($connection === $current) {
                continue;
            }

            $current->write($connection->getRemoteAddress().': ');
            $current->write($data);
        }
    });

    $connection->on('end', function () use ($clients, $connection) {
        $clients->detach($connection);
    });
});

echo "Socket server listening on port 4000.\n";
echo "You can connect to it by running: telnet localhost 4000\n";

$socket->listen(4000, '0.0.0.0');
$loop->run();
