<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'home_work13');

$conn = new mysqli(DB_SERVER,DB_USERNAME , DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno()) {
    printf('Connection to the server MySQL is not possible. Error code: %s\n', mysqli_connect_error());
    exit;
}