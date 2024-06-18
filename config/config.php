<?php
//database configuration

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'shaheera');

//create connection
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//check connectivity
if (!$conn) {
    die("Connection failure: ". mysqli_connect_error());
}