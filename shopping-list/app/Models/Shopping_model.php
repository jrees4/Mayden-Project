<?php

namespace App\Models;

use App\Libraries\DatabaseConnector;

class FoodsModel {
    private $collection;

    function __construct() {
        $connection = new DatabaseConnector();
        $database = $connection->getDatabase();
        $this->collection = $database->foods;
    }

    // Foods
    // ＼（〇_ｏ）／
    // Basic Gets
    function getfoods($limit = 50) {
        try {
            $cursor = $this->collection->find([], ['limit' => $limit]);
            $foods = $cursor->toArray();

            return $foods;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching foods: ' . $ex->getMessage(), 500);
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
    // Not sure this is neccessary for foods... probably best to make it for the list itself, however. IT can't hurt to future proof.
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

    // List
    // (⊙_⊙)？
    function getList(){

    }

    function createList(){

    }

    function emailList(){

    }
}