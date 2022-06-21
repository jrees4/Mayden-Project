<?php

namespace App\Models;

use App\Libraries\DatabaseConnector;

class FoodsModel {
    private $collection;

    function __construct() {
        $connection = new DatabaseConnector();
        $database = $connection->getDatabase();
        $this->collection = $database->books;
    }

    // Basic Gets
    function get($limit = 50) {
        try {
            $cursor = $this->collection->find([], ['limit' => $limit]);
            $books = $cursor->toArray();

            return $books;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching foodss: ' . $ex->getMessage(), 500);
        }
    }

    function getSingle($id) {
        try {
            $book = $this->collection->findOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);

            return $book;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching food with ID: ' . $id . $ex->getMessage(), 500);
        }
    }

    // Create
    function insertFood($name, $cost, $description) {
        try {
            $insertOneResult = $this->collection->insertOne([
                'foodName' => $name,
                'cost' => $cost,
                'description' => $description,
            ]);

            if($insertOneResult->getInsertedCount() == 1) {
                return true;
            }

            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while creating a food: ' . $ex->getMessage(), 500);
        }
    }

    // Update
    function updateFood($id, $name, $cost, $description) {
        try {
            $result = $this->collection->updateOne(
                ['_id' => new \MongoDB\BSON\ObjectId($id)],
                ['$set' => [
                    'foodName' => $name,
                    'cost' => $cost,
                    'description' => $description,
                ]]
            );

            if($result->getModifiedCount()) {
                return true;
            }

            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while updating a food with ID: ' . $id . $ex->getMessage(), 500);
        }
    }

    // Delete
    function deleteFood($id) {
        try {
            $result = $this->collection->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);

            if($result->getDeletedCount() == 1) {
                return true;
            }

            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while deleting a book with ID: ' . $id . $ex->getMessage(), 500);
        }
    }

    // Not sure this is neccessary for foods... probably best to make it for the list itself, however. IT can't hurt to future proof.
}