<?php
 
namespace App\Libraries;

class DatabaseConnector {
    private $client;
    private $database;

    function __construct() {
        $uri = getenv('ATLAS_URI');
        $database = getenv('DATABASE');

        if (empty($uri) || empty($database)) {
            $this->show_error('You need to declare ATLAS_URI and DATABASE in your .env file!');
        }

        try {
            $this->client = new \MongoDB\Client($uri);
        } catch(MongoDB\Driver\Exception\MongoConnectionException $ex) {
            $this->show_error('Couldn\'t connect to database: ' . $ex->getMessage(), 500);
        }

        try {
            $this->database = $this->client->selectDatabase($database);
        } catch(MongoDB\Driver\Exception\RuntimeException $ex) {
            $this->show_error('Error while fetching database with name: ' . $database . $ex->getMessage(), 500);
        }
    }

    function getDatabase() {
        return $this->database;
    }

    function show_error($message){
        echo ('<pre>'. $message .'</pre>');
    }
}