<?php

require '../../../includes/db.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $id = $_POST['id'];

    $query = "UPDATE customers SET name=?,email=?,password=?,dob=?,address=?,phone=?,gender=? WHERE id=?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssi", $name, $email, $password,$dob, $address, $phone, $gender, $id);

    if( mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'customer profile update successful']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'customer profile update failed']);
    }
}