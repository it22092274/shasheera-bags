<?php
require '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $material = $_POST['material'];
    $size = $_POST['size'];
    $strap = $_POST['strap'];
    $care = $_POST['care'];
    $color = $_POST['color'];

    $query = "SELECT image1,image2,image3 FROM products WHERE id =?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt,"i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,  $existingImage1, $existingImage2, $existingImage3);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    $image1Path = $existingImage1;
    $image2Path = $existingImage2;
    $image3Path = $existingImage3;

    $targetDir = "../../assets/images/";

    if(isset($_FILES['image1']) && $_FILES['image1']['error'] == UPLOAD_ERR_OK ) {
        $image1 = $_FILES['image1'];
        $image1Path = $targetDir . basename($image1['name']);
        move_uploaded_file($image1['tmp_name'], $image1Path);
        if($existingImage1 && file_exists($existingImage1)){
            unlink($existingImage1);
        }
    }
    if (isset($_FILES['image2']) && $_FILES['image2']['error'] == UPLOAD_ERR_OK) {
        $image2 = $_FILES['image2'];
        $image2Path = $targetDir . basename($image2['name']);
        move_uploaded_file($image2['tmp_name'], $image2Path);
        if ($existingImage2 && file_exists($existingImage2)) {
            unlink($existingImage2); // Delete old image
        }
    }
    if (isset($_FILES['image3']) && $_FILES['image3']['error'] == UPLOAD_ERR_OK) {
        $image3 = $_FILES['image3'];
        $image3Path = $targetDir . basename($image3['name']);
        move_uploaded_file($image3['tmp_name'], $image3Path);
        if ($existingImage3 && file_exists($existingImage3)) {
            unlink($existingImage3); // Delete old image
        }
    }

      // Prepare and bind
      $stmt = mysqli_prepare($conn, "UPDATE products SET name=?, description=?, price=?, color=?, size=?, strap=?, material=?, care=?, image1=?, image2=?, image3=? WHERE id=?");
      mysqli_stmt_bind_param($stmt, "ssissssssssi", $name, $description, $price, $color, $size, $strap, $material, $care, $image1Path, $image2Path, $image3Path, $id);
  
      // Execute the statement
      if (mysqli_stmt_execute($stmt)) {
          echo json_encode(['status' => 'success', 'message' => 'Product updated successfully']);
      } else {
          echo json_encode(['status' => 'error', 'message' => 'Failed to update product']);
      }
  
      // Close the statement and connection
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
  } else {
      echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
  }