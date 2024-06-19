<?php

require '../../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $emai = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO admins (name, email, password) VALUES(?,?,?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $name, $emai, $password);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'admin added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'failed']);
    }
}