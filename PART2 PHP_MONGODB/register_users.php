<?php
require('session_users.php');
require('user_users.php');
$user = new User();
if($user->isLoggedIn())
{
    echo "You are already registred";
    header('location: login_user.php');
    exit;
}

$action = (!empty($_POST['login']) && ($_POST['login'] === 'Register')) ? 'register' : 'show_form';
switch($action)
{
        case 'register':
            echo $_POST['name'];
            echo $_POST['username'];
            echo $_POST['password'];
            echo $_POST['address'];
            echo $_POST['birthday'];

            $newuser = array(
                'name' => $_POST['name'],
                'username' => $_POST['username'],
                'password' => md5($_POST['password']),
                'birthday'  => new MongoDate(strtotime($_POST['birthday'])),
                'address' => array('town' => $_POST['address'], 'planet' => 'Terrus')
            );
            $mongodb = new Mongo();
            $collection = $mongodb->user_tasty->users;
            $collection->insert($newuser);
            echo 'User account created successfully';
            header('location: login_user.php');
            exit;
        case 'show_form':
        default:
            $errorMessage = NULL;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/gridlayout.css">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <title>Log in to Tasty Recipes</title>
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
            <li><a href="gridhtml.html">Home</a></li>
            <li><a href="/products/">Calendar</a>
                <ul>
                    <li>
                        <a href="calendrier.html">January</a>
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
                    <li><a href="recept11.php">Meatballs</a></li>
                    <li><a href="recept12.php">Pancakes</a></li>
                </ul>
            </li>
            <li><a href="/services/">Feedback</a>
                <ul>
                    <li><a href="/services/design/">Website</a></li>
                    <li><a href="/services/development/">Recipes</a></li>
                </ul>
            </li>
            <li><a href="/contact/">Contact Us</a></li>
            <li><a href="login_user.php">Log in</a></li>
            <li><a href="register_users.php">Register</a></li>
        </ul>
    </div>
    <div class="s1">
    </div>
</div>


<div class="text">
    <div class="space1"></div>
    <div class="talk">
        <h2>Welcome to this Website ! Amazing !</h2>
        <h4>You can use the calendar (sign* ) above to see how to navigate and use our suggestions for foods for every day !</h4>

            <h1>Register yourself</h1>
            <form action="register_users.php" method="post">
                <ul>
                    <?php if(isset($errorMessage)): ?>
                        <li><?php echo $errorMessage; ?></li>
                    <?php endif ?>
                    <li>
                        <label>Name </label>
                        <input  tabindex="1" type="text" name="name" value=""/>
                    </li>
                    <li>
                        <label>Username </label>
                        <input tabindex="2" type="text" name="username" value=""/>
                    </li>
                    <li>
                        <label>Birthday </label>
                        <input tabindex="3" type="text" name="birthday" value=""/>
                    </li>
                    <li>
                        <label>Address </label>
                        <input tabindex="4" type="text" name="address" value=""/>
                    </li>
                    <li>
                        <label>Choose you password </label>
                        <input tabindex="5" type="password" name="password"/>
                    </li>

                    <li>
                        <input id="login-submit" name="login" tabindex="6" type="submit" value="Register" />
                    </li>
                    <li class="clear"></li>
                </ul>
            </form>

    </div>
    <div class="space2"></div>
</div>


</body>
</html>