<?php
require('session_users.php');
require('user_users.php');
$user = new User();
$id = $_GET['id'];
if(!$user->isLoggedIn())
{
    header('location: login_user.php');
    exit;
}

try{
    $mongodb = new Mongo();
    $Commentcollection = $mongodb->user_tasty->comments;
    $thecomments = $Commentcollection->findOne(array('_id'=> new MongoId($id)));
    $authour = $thecomments['name'];

} catch (MongoConnectionException $e) {
    die('Failed to connect to MongoDB '.$e->getMessage());
}
if(($user->name != $authour))
{
    echo "You are not the authour of this message !";
    header('location: gridhtml.html');
}
else
{
    $Commentcollection->remove(array('_id' => new MongoId($id)));
    header('location: calendrier.html');
}

exit;