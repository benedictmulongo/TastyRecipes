<?php

class DBConnection_users
{
    const HOST   = 'localhost';
    const PORT   = 27017;
    const DBNAME = 'user_tasty';

    private static $instance;

    public $connection;
    public $database;

    private function __construct()
    {
        $connectionString = sprintf('mongodb://%s:%d', DBConnection_users::HOST, DBConnection_users::PORT);

        try {

            $this->connection = new Mongo($connectionString);
            $this->database = $this->connection->selectDB(DBConnection_users::DBNAME);

        } catch (MongoConnectionException $e) {
            throw $e;
        }
    }

    static public function instantiate()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class;
        }

        return self::$instance;
    }

    public function getCollection($name)
    {
        return $this->database->selectCollection($name);
    }
}