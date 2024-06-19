<?php

require '../../../includes/db.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM admins WHERE id=?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i",  $id);

    if( mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'admin removed successful']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'admin remove failed']);
    }
}