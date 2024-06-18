<?php

include '../config/config.php';

function getDbConnection() {
    global $conn;
    return $conn;
}