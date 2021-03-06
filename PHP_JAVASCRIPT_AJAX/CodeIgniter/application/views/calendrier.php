<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/normalize.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/gridlayout.css">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <title>Calendar</title>
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




<div class="calendar_layout">

    <div class="right0"> </div>
    <div class="d1"> Mon </div>
    <div class="d2"> Tue </div>
    <div class="d3"> Wed </div>
    <div class="d4"> Thu </div>
    <div class="d5"> Fri </div>
    <div class="d6"> Sa </div>
    <div class="d7"> Sun </div>
    <div class="left0"></div>

    <div class="right1"> </div>
    <div class="day1">  </div>
    <div class="day2"> 1 </div>
    <div class="day3"> 2 </div>
    <div class="day4"> 3 </div>
    <div class="day5">
        4
        <a href ="/MyWebsite/CodeIgniter/index.php/calendar_view/recept_11">
            <img src="<?php echo base_url('mat3.jpg'); ?>" width = "52" height ="38" alt ="Calendar page"/>
        </a>
    </div>
    <div class="day6"> 5 </div>
    <div class="day7"> 6 </div>
    <div class="left1"></div>

    <div class="right2"></div>
    <div class="day8"> 7 </div>
    <div class="day9"> 8 </div>
    <div class="day10"> 9 </div>
    <div class="day11"> 10 </div>
    <div class="day12"> 11 </div>
    <div class="day13"> 12 </div>
    <div class="day14"> 13 </div>
    <div class="left2"></div>

    <div class="right3"></div>
    <div class="day15"> 14 </div>
    <div class="day16"> 15 </div>
    <div class="day17">
        16
        <a href ="/MyWebsite/CodeIgniter/index.php/calendar_view/recept_12">
            <img src="<?php echo base_url('mat5.jpg'); ?>" width = "52" height ="38" alt ="Calendar page"/>
        </a>
    </div>
    <div class="day18"> 17 </div>
    <div class="day19"> 18 </div>
    <div class="day20"> 19 </div>
    <div class="day21"> 20 </div>
    <div class="left3"></div>

    <div class="right4"></div>
    <div class="day22"> 21 </div>
    <div class="day23"> 22 </div>
    <div class="day24"> 23 </div>
    <div class="day25"> 24 </div>
    <div class="day26"> 25 </div>
    <div class="day27"> 26 </div>
    <div class="day28"> 27 </div>
    <div class="left4"></div>

    <div class="right5"></div>
    <div class="day29"> 28 </div>
    <div class="day30"> 29 </div>
    <div class="day31"> 30 </div>
    <div class="day32"> 31 </div>
    <div class="day33">  </div>
    <div class="day34">  </div>
    <div class="day35">  </div>
    <div class="left5"></div>
</div>
</body>
</html>