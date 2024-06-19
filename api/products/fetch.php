<?php

require '../../includes/db.php';

header('Content-Type: application/json');

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch products']);
    exit();
}

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

echo json_encode(['status' => 'success', 'products' => $products]);

mysqli_free_result($result);
mysqli_close($conn);