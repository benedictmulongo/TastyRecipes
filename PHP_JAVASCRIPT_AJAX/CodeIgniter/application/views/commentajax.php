
<?php
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/session_users.php');
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/user_users.php');
$id = $_GET['id'];

$user = new User();
$name = $user->name;
$can_comment = 0;
$comment_not = "Access Forbidden! You cannot comment, loser ! ";
try {
    $connection = new Mongo();
    $database = $connection->selectDB('user_tasty');
    $collection = $database->selectCollection('comments');
} catch(MongoConnectionException $e) {
    die("Failed to connect to database ".$e->getMessage());
}
$cursor = $collection->find(array('recipe' => '2'));


            if($user->isLoggedIn())
            {
                $connection = new Mongo();
                $database = $connection->selectDB('user_tasty');
                $collection = $database->selectCollection('comments');

                //********good **********

                    $com = array('name' => $user->name, 'recipe' => '2', 'time'  => new MongoDate(), 'content' => $_POST['content']);
                    $collection->insert($com);


                print_r("added");
            }
            else
            {
                print_r("Access Forbidden! You cannot comment, loser ! ");
            }



?>