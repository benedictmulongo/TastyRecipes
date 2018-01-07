<?php
require_once('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/session_users.php');
require_once('/opt/lampp/htdocs/MyWebsite/CodeIgniter/application/models/user_users.php');

$user = new User();
$user->logout();

header('location: /MyWebsite/CodeIgniter');
exit;
