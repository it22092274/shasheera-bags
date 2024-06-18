<?php

require_once '../config/config.php';

function getDbConnection() {
    global $conn;
    return $conn;
}