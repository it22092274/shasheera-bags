<?php

require '../../../includes/db.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "UPDATE admins SET name=?,email=?,password=? WHERE id=?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $password, $id);

    if( mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'admin profile update successful']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'admin profile update failed']);
    }
}