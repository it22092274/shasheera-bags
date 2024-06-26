<?php
require '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $material = $_POST['material'];
    $size = $_POST['size'];
    $strap = $_POST['strap'];
    $care = $_POST['care'];
    $color = $_POST['color'];

    $image1 = $_FILES['image1'];
    $image2 = $_FILES['image2'];
    $image3 = $_FILES['image3'];

    // Image upload paths
    $targetDir = "../../assets/images/";
    $image1Path = $targetDir . basename($image1['name']);
    $image2Path = $targetDir . basename($image2['name']);
    $image3Path = $targetDir . basename($image3['name']);

    // Moving uploaded files to the target directory
    if (move_uploaded_file($image1['tmp_name'], $image1Path) &&
        move_uploaded_file($image2['tmp_name'], $image2Path) &&
        move_uploaded_file($image3['tmp_name'], $image3Path)) {

        // Prepare and bind
        $stmt = mysqli_prepare($conn, "INSERT INTO products (name, description, price, color, size, strap, material, care, image1, image2, image3) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "ssissssssss", $name, $description, $price, $color, $size, $strap, $material, $care, $image1Path, $image2Path, $image3Path);

        // Executing the statement
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['status' => 'success', 'message' => 'Product added successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add product']);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to upload images']);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
