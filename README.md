## React-PHP examples
This is just an example of the sockets implementation using react-php libraries.

## Install
* `git clone git@github.com:vladzur/phpsocket.git`
* `composer install`

## Run
### Simple socket
This is a simple socket listening in port 4000

`php socket-server.php`

Then you can open telnet send messages (in a different terminal window)
`telnet 127.0.0.1 4000` (client one)

`telnet 127.0.0.1 4000` (client two)

### WebSocket
Thisn is a more advanced example using the Ratchet library

`php chat-server.php`

This script open a websocket listening port 8080, now you can connect some web client to it



