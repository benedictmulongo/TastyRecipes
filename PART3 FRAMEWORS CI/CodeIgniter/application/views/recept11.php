<?php
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/session_users.php');
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/user_users.php');
$id = $_GET['id'];
$action = (!empty($_POST['btn_submit']) && ($_POST['btn_submit'] === 'Comment')) ? 'save_comment' : 'show_form';
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
$cursor = $collection->find(array('recipe' => '1'));
function is_html($string) {
    // Check if string contains any html tags.
    return preg_match('/<\s?[^\>]*\/?\s?>/i', $string);
}
switch($action)
{
    case 'save_comment':
        try {
            if($user->isLoggedIn())
            {
                $connection = new Mongo();
                $database = $connection->selectDB('user_tasty');
                $collection = $database->selectCollection('comments');

                //********good **********
                $url = parse_url($_POST['content']);
                $var = $url['host'];
                $emptyy = strlen($var);
                //*******end ************

                $length = mb_strlen($_POST['content']);

                if (($length > 0) && ($length <= 1000) && ($emptyy == 0)) {
                    $com = array('name' => $user->name, 'recipe' => '1', 'time'  => new MongoDate(), 'content' => $_POST['content']);
                    $collection->insert($com);
                }
            }
            else
            {
                echo "Access Forbidden! You cannot comment, loser ! ";
            }

        } catch(MongoConnectionException $e) {
            die("Failed to connect to database ". $e->getMessage());
        }
        catch(MongoException $e) {
            die('Failed to insert data '.$e->getMessage());
        }
        break;
    case 'show_form':
    default:
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css"
          href = "<?php echo base_url(); ?>css/normalize.css">
    <link rel = "stylesheet" type = "text/css"
          href = "<?php echo base_url(); ?>css/gridlayout.css">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <title>Meatbolls</title>
</head>
<body>

<div class="app-layout">
    <div class="tweets">
    </div>
    <div class="replies">
    </div>
    <div class="search">
    </div>
    <div class="t1">
    </div>
    <div class="r1">
        <ul class="nav">
            <li><a href="/MyWebsite/CodeIgniter">Home</a></li>
            <li><a href="/products/">Calendar</a>
                <ul>
                    <li>
                        <a href="/MyWebsite/CodeIgniter/index.php/calendar_view/index">January</a>
                    </li>
                    <li><a href="/products/fontdeck/">February</a></li>
                    <li><a href="/products/silverback/">Mars</a></li>
                    <li><a href="/products/fontdeck/">April</a></li>
                    <li><a href="/products/silverback/">May</a></li>
                    <li><a href="/products/fontdeck/">June</a></li>
                    <li><a href="/products/silverback/">July</a></li>
                    <li><a href="/products/fontdeck/">August</a></li>
                    <li><a href="/products/silverback/">September</a></li>
                    <li><a href="/products/fontdeck/">October</a></li>
                    <li><a href="/products/silverback/">November</a></li>
                    <li><a href="/products/fontdeck/">December</a></li>
                </ul>
            </li>
            <li><a href="/services/">Recipes</a>
                <ul>
                    <li><a href="/MyWebsite/CodeIgniter/index.php/calendar_view/recept_11">Meatballs</a></li>
                    <li><a href="/MyWebsite/CodeIgniter/index.php/calendar_view/recept_12">Pancakes</a></li>
                </ul>
            </li>
            <li><a href="/services/">Feedback</a>
                <ul>
                    <li><a href="/services/design/">Website</a></li>
                    <li><a href="/services/development/">Recipes</a></li>
                </ul>
            </li>
            <li><a href="/contact/">Contact Us</a></li>
            <li><a href="/MyWebsite/CodeIgniter/index.php/calendar_view/login">Log in</a></li>
            <li><a href="/MyWebsite/CodeIgniter/index.php/calendar_view/register_user">Register</a></li>
        </ul>
    </div>
    <div class="s1">
    </div>
</div>

<div class="text">
    <div class="space1"></div>
    <div class="talk">
        <h1>Meatbolls recipe</h1>
        <img src="<?php echo base_url('mat5.jpg'); ?>" width = "52" height ="38" alt ="food meatbolls"/>
        <h4>Steps to make a very good Meatbolls!</h4>
        <h2>Ingredients</h2>
        <h5> 1lb lean (at least 80%) ground beef </h5>
        <h5>1/2 cup Progresso™ Italian-style bread crumbs</h5>
        <h5>1/4 cup milk</h5>
        <h5>1/2 teaspoon salt</h5>
        <h5>1/2 teaspoon Worcestershire sauce</h5>
        <h5>1/4 teaspoon pepper</h5>
        <h5>1 small onion, finely chopped (1/4 cup)</h5>
        <h5>1 egg</h5>
        <h2> Steps</h2>
        <h5>1 Heat oven to 400°F. Line 13x9-inch pan with foil; spray with cooking spray.</h5>
        <h5>2 In large bowl, mix all ingredients. Shape mixture into 20 to 24 (1 1/2-inch) meatballs. Place 1 inch apart in pan.</h5>
        <h5>3 Bake uncovered 18 to 22 minutes or until no longer pink in center.</h5>

        <?php if($user->isLoggedIn()): ?>
            <li><?php echo " $user->name are logged in . ($user->isLoggedIn())"; ?></li>
        <?php endif ?>


        <table>
            <thead>
            <tr>
                <th width="50%">Comments </th>
                <th width="*"></th>
            </tr>
            </thead>
            <tbody>
            <?php while($cursor->hasNext()):$comment = $cursor->getNext();?>
                <tr>
                    <td>
                        <h3><?php echo htmlentities($comment['name'], ENT_QUOTES, 'UTF-8').",    "; ?></h3>
                        <p> <?php echo htmlentities($comment['content'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </td>
                    <td>
                        <a href="/MyWebsite/CodeIgniter/index.php/delete_comments/index/<?php echo $comment['_id'];?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile;?>
            </tbody>
        </table>


        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h3>Comment : </h3>
            <textarea name="content" rows="20"></textarea>
            <p>
                <input type="submit" name="btn_submit" style = "width: 12ch" value="Comment"/>
            </p>
        </form>

    </div>
    <div class="space2"></div>
</div>

</body>
</html>