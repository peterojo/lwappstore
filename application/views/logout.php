<?php
require 'core/init.php';
$session->logout();
header('Location: login.php');
?>