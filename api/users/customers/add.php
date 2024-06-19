<?php

require '../../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $query = "INSERT INTO customers (name, email, password, dob, address, phone, gender) VALUES(?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $password, $dob, $address, $phone, $gender);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'signup successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'failed']);
    }
}