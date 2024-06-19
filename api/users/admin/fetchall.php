<?php

require '../../../includes/db.php';

header('Content-Type: application/json');

$query = "SELECT * FROM admins ";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(['status' => 'error', 'message' => 'failed to fetch admins ']);
    exit();
} else {
    $admins = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $admins[] = $row;
    }
    echo json_encode(['status' => 'success', 'admins' => $admins]);
}

mysqli_free_result($result);
mysqli_close($conn);
