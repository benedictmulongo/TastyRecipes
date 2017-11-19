<?php
require_once('session_users.php');
require_once('user_users.php');

$user = new User();
$user->logout();

header('location: gridhtml.html');
exit;