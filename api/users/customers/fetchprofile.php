<?php
require '../../../includes/db.php'; // Adjust path to your database connection script

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL statement
    $stmt = mysqli_prepare($conn, "SELECT id, name, email, dob, phone, address, gender, created_at FROM customers WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $name, $email, $dob, $phone, $address, $gender, $created_at);

    // Fetch customer profile
    if (mysqli_stmt_fetch($stmt)) {
        // Construct profile array
        $profile = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'dob' => $dob,
            'phone' => $phone,
            'address' => $address,
            'gender' => $gender,
            'created_at' => $created_at
        ];
        // Return JSON response
        echo json_encode(['status' => 'success', 'profile' => $profile]);
    } else {
        // If customer with given ID not found
        echo json_encode(['status' => 'error', 'message' => 'Customer not found']);
    }

    // Close statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Invalid request method or missing ID parameter
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method or missing ID']);
}
?>
