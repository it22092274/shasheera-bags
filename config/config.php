<?php
//database configuration

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'shasheera';

//create connection
$conn = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

//check connectivity
if (!$conn) {
    die("Connection failure: ". mysqli_connect_error());
}

?>