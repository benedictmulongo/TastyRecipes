<?php

require('dbconnection_users.php');

$mongo = DBConnection_users::instantiate();
$collection = $mongo->getCollection('users');

$users = array(
                array(  
                        'name' => 'SkyRock',
                        'username' => 'chitmaster11',
                        'password' => md5('nothing'),
                        'birthday'  => new MongoDate(strtotime('1971-09-29 00:00:00')),
                        'address' => array('town' => 'The heaven', 'planet' => 'OneLove')
                    ),
                array(
                    'name' => 'Ben',
                    'username' => 'benedict',
                    'password' => md5('lavie'),
                    'birthday'  => new MongoDate(strtotime('1994-05-19 00:00:00')),
                    'address' => array('town' => 'STHLM', 'planet' => 'WORLD')
                )
        );
        
foreach($users as $user)
{
    try{
        $collection->insert($user);
    } catch (MongoCursorException $e)
    {
        die($e->getMessage());
    }
}

echo 'Users created successfully';
