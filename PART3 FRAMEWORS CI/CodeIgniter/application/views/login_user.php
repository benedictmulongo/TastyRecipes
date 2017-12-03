<?php
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/session_users.php');
require('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/user_users.php');
$action = (!empty($_POST['login']) && ($_POST['login'] === 'Log in')) ? 'login' : 'show_form';
$user = new User();
$in_or_out = '0';
if(!$user->isLoggedIn())
{
    switch($action)
    {
        case 'login':

            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($user->authenticate($username, $password))
            {
                header('location: /MyWebsite/CodeIgniter');
                exit;
            }else {
                $errorMessage = "Username/password did not match. Sorry ! try again .";
                break;
            }

        case 'show_form':
        default:
            $errorMessage = NULL;
    }
}
else
{
    echo "You already logged in !";
    $in_or_out = '1';
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
        <h2>Welcome to this Website ! Amazing !</h2>
        <h4>You can use the calendar above in the menu to see how to navigate and use our suggestions for foods for every day !</h4>


        <?php if ($in_or_out === '0'): ?>
            <h1>Log in here</h1>
            <form id="login" action="/MyWebsite/CodeIgniter/index.php/calendar_view/login" method="post" accept-charset="utf-8">
                <ul>
                    <?php if(isset($errorMessage)): ?>
                        <li><?php echo $errorMessage; ?></li>
                    <?php endif ?>
                    <li>
                        <label>Username </label>
                        <input class="textbox" tabindex="1" type="text" name="username" autocomplete="off"/>
                    </li>
                    <li>
                        <label>Password </label>
                        <input class="textbox" tabindex="2" type="password" name="password"/>
                    </li>
                    <li>
                        <input id="login-submit" name="login" tabindex="3" type="submit" value="Log in" />
                    </li>
                    <li class="clear"></li>
                </ul>
            </form>

        <?php else: ?>
            <p>
            <h4>You are logged in !</h4>
            <a style="float:right;" href="/MyWebsite/CodeIgniter/index.php/calendar_view/logout">Log out</a>
            <h1>Hello <?php echo $user->username; ?></h1>
            <ul class="profile-list">
                <li>
                    <span class="field">Username</span>
                    <span class="value"><?php echo htmlentities($user->username, ENT_QUOTES, 'UTF-8'); ?></span>
                    <div class="clear"> </div>
                </li>
                <li>
                    <span class="field">Name</span>
                    <span class="value"><?php echo htmlentities($user->name, ENT_QUOTES, 'UTF-8'); ?></span>
                    <div class="clear"> </div>
                </li>
                <li>
                    <span class="field">Birthday</span>

                    <span class="value"><?php echo htmlentities(date('j F, Y',$user->birthday->sec), ENT_QUOTES, 'UTF-8'); ?></span>
                    <div class="clear"> </div>
                </li>
                <li>
                    <span class="field">Address</span>
                    <span class="value"><?php echo htmlentities($user->address, ENT_QUOTES, 'UTF-8'); ?></span>
                    <div class="clear"> </div>
                </li>
            </ul>
            </p>
        <?php endif;?>

    </div>
    <div class="space2"></div>
</div>


</body>
</html>