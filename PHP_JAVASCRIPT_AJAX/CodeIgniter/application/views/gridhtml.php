<!DOCTYPE html>
<html lang="en">
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



    <title><?php echo $mega_title ?></title>
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


<iframe src="https://www.facebook.com/plugins/follow?href=https%3A%2F%2Fwww.facebook.com%2Fmulongo.ben&amp;layout=standard&amp;show_faces=true&amp;colorscheme=light&amp;width=450&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>

<div class="text">
    <div class="space1"></div>
    <div class="talk">
        <h1><?php echo $title ?></h1>
        <<p><?php echo $message ?></p>
    </div>

    <div class="space2"></div>
</div>
<embed src= "/sound.wav" width="1" height="0" Hidden="true" autostart="true" loop="-1">

</body>
</html>