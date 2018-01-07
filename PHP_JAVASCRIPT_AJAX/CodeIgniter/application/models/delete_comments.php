<?php
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/session_users.php');
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/user_users.php');
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
    header('location: /MyWebsite/CodeIgniter');
}
else
{
    $Commentcollection->remove(array('_id' => new MongoId($id)));
    header('location: /MyWebsite/CodeIgniter/index.php/calendar_view/index');
}

exit;