<?php

require '../../includes/db.php';

if ( $_SERVER['REQUEST_METHOD']  == 'POST') {
    $id = $_POST['id'];

    // Fetch existing images paths
    $query = "SELECT image1, image2, image3 FROM products WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $image1, $image2, $image3);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

     // Delete product from database
     $stmt = mysqli_prepare($conn, "DELETE FROM products WHERE id = ?");
     mysqli_stmt_bind_param($stmt, "i", $id);

     if (mysqli_stmt_execute($stmt)) {
        // Delete images from server
        if ($image1 && file_exists($image1)) {
            unlink($image1);
        }
        if ($image2 && file_exists($image2)) {
            unlink($image2);
        }
        if ($image3 && file_exists($image3)) {
            unlink($image3);
        }
        echo json_encode(['status' => 'success', 'message' => 'Product deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete product']);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}