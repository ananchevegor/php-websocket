<?php

use Workerman\Worker;

require_once __DIR__.'/../vendor/autoload.php';

$hashmap = array();

$ws_worker = new Worker('websocket://0.0.0.0:2346');


$ws_worker->count=4;

// Emitted when new connection come
$ws_worker->onConnect = function ($connection){
    echo "new connection ";
};

// Emitted when data received
$ws_worker->onMessage = function ($connection, $data) use ($ws_worker) {
    // Send hello $data
    $json = json_decode($data, true);
    
    if($json['event'] == 'connect'){
        $username = $json['user'];
        $hashmap[$username] = $connection;
        var_dump($hashmap);
    }elseif ($json['event'] == 'toUser') {
        
        
    }else{
        foreach ($ws_worker->connections as $clientConnection) {
            if($clientConnection!=$connection){
                $clientConnection->send($json['message']);
            }
        }
    }
    
    
};

// Emitted when connection closed
$ws_worker->onClose = function ($connection) {
    echo "Connection closed\n";
};

// Run worker
Worker::runAll();

?>