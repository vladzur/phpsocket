## React-PHP examples
This is just a few examples of the sockets implementation using react-php and Ratchet libraries.

## Install
* `git clone git@github.com:vladzur/phpsocket.git`
* `composer install`

## Run

### Basic example
This open a socket lstening port 1337

`php basic.php`

Open in web browser http://127.0.0.1:1337

### Simple socket
This is a simple socket listening in port 4000

`php socket-server.php`

Then you can open telnet send messages (in a different terminal window)
`telnet 127.0.0.1 4000` (client one)

`telnet 127.0.0.1 4000` (client two)

### WebSocket
Thisn is a more advanced example using the Ratchet library

`php chat-server.php`

This script open a websocket listening port 6080, now you can connect some web client to it



