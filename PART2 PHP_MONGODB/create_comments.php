<?php

require('dbconnection_users.php');

$mongo = DBConnection_users::instantiate();
$collection = $mongo->getCollection('comments');

$comments = array(
    array(
        'name' => 'SkyRock',
        'recipe' => '2',
        'time'  => new MongoDate(),
        'content' => "Very good. Very good. Me very hungry Mums ! Mums !"
    ),
    array(
        'name' => 'Ben',
        'recipe' => '1',
        'time'  => new MongoDate(),
        'content' => "What a beautiful website ! such a beautiful description of each recipes, I am done OMG !! \n"
    )
);

foreach($comments as $comment)
{
    try{
        $collection->insert($comment);
    } catch (MongoCursorException $e)
    {
        die($e->getMessage());
    }
}

echo 'Comments created successfully';
