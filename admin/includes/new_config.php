<?php
// Define Database config
defined("DB_HOST") ? null : define("DB_HOST", getenv("MYSQL_SERVICE_HOST"));
defined("DB_USER") ? null : define("DB_USER", getenv("MYSQL_USERNAME"));
defined("DB_PASS") ? null : define("DB_PASS", getenv("MYSQL_PASSWORD"));
defined("DB_NAME") ? null : define("DB_NAME", getenv("MYSQL_DATABASE"));

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>
