<?php

use Workerman\Worker;

require_once __DIR__.'/../vendor/autoload.php';




$ws_worker = new Worker('websocket://0.0.0.0:2346');


$ws_worker->count=4;

// Emitted when new connection come
$ws_worker->onConnect = function ($connection) {

};

// Emitted when data received
$ws_worker->onMessage = function ($connection, $data) {
    // Send hello $data

    foreach($connections_user as $connection){
        $connection->send("hello");
    }

    
};

// Emitted when connection closed
$ws_worker->onClose = function ($connection) {
    echo "Connection closed\n";
};

// Run worker
Worker::runAll();

?>