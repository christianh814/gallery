<?php
require_once("includes/header.php");
//
$session->logout();
redirectTo("/admin/login.php");
?>
