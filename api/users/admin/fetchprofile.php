<?php
require '../../../includes/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = mysqli_prepare($conn, "SELECT id, name, email, created_at FROM admins WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $name, $email, $created_at);

    if (mysqli_stmt_fetch($stmt)) {
        $admin = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'created_at' => $created_at
        ];
        echo json_encode(['status' => 'success', 'admin' => $admin]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Admin not found']);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method or missing ID']);
}
?>
