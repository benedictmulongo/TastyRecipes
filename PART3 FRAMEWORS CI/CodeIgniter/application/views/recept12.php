<?php
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/session_users.php');
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/user_users.php');
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
$cursor = $collection->find(array('recipe' => '2'));

switch($action)
{
    case 'save_comment':
        try {
            if($user->isLoggedIn())
            {
                $connection = new Mongo();
                $database = $connection->selectDB('user_tasty');
                $collection = $database->selectCollection('comments');

                $length = mb_strlen($_POST['content']);
                $is_html = preg_match('/<\s?[^\>]*\/?\s?>/i', $_POST['content']);

                //********good **********
                $url = parse_url($_POST['content']);
                $var = $url['host'];
                $emptyy = strlen($var);
                //*******end ************
                var_dump($is_hmtl > 0);
                echo "now respons : ";

                if (($length > 0) && ($length <= 1000) && ($emptyy == 0)) {
                    $com = array('name' => $user->name, 'recipe' => '2', 'time'  => new MongoDate(), 'content' => $_POST['content']);
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
        <h1>Pancakes recipe</h1>
        <img src="<?php echo base_url('mat4.jpg'); ?>" width = "52" height ="38" alt ="food pancake"/>
        <h2>Ingredients</h2>
        <h5>1 c. all-purpose flour</h5>
        <h5>2 tbsp. sugar</h5>
        <h5>2 1/2 tsp. baking powder</h5>
        <h5>1/2 tsp. salt</h5>
        <h5>1 1/4 c. milk</h5>
        <h5>3 tbsp. butter, melted</h5>
        <h5>1 large egg</h5>
        <h5>Vegetable oil for brushing pan</h5>
        <h2>Steps</h2>
        <h5>In large bowl, whisk flour, sugar, baking powder and salt.</h5>
        <h5>Add milk, butter and egg; stir until flour is moistened.</h5>
        <h5>Heat 12-inch nonstick skillet or griddle over medium heat until</h5>
        <h5>drop of water sizzles; brush lightly with oil. In batches, scoop </h5>
        <h5>batter by scant 1/4-cupfuls into skillet, spreading to3 1/2 inches</h5>
        <h5>each. Cook 2 to 3 minutes or until bubbly and edges are dry. </h5>
        <h5>With wide spatula, turn; cook 2 minutes more or until golden.</h5>
        <h5>Transfer to platter or keep warm on a cookie sheet in 225°F oven.</h5>
        <h5>Repeat with remaining batter, brushing griddle with more oil if necessary</h5>

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
                        <h3><?php echo htmlentities($comment['name'], ENT_QUOTES, 'UTF-8').",     "; ?></h3>
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