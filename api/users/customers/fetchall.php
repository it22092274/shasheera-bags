<?php

require '../../../includes/db.php';

header('Content-Type: application/json');

$query = "SELECT * FROM customers ";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(['status' => 'error', 'message' => 'failed to fetch customers ']);
    exit();
} else {
    $customers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $customers[] = $row;
    }
    echo json_encode(['status' => 'success', 'customers' => $customers]);
}

mysqli_free_result($result);
mysqli_close($conn);
