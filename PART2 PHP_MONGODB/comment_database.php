<?php

require_once('dbconnection_users.php');
require_once('session_users.php');

class Comment_database
{
    const COLLECTION = 'comments';

    private $_mongo;
    private $_collection;
    private $_user;

    public function __construct()
    {
        $this->_mongo = DBConnection_users::instantiate();
        $this->_collection = $this->_mongo->getCollection(User::COLLECTION);
    }

}