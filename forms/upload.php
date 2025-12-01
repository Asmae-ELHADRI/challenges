<?php 

if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES['fileUpload']['name']);

    $check = getimagesize($_FILES['fileUpload']['tmp_name']);
    if ($check !== false) {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $targetFile);
            echo "File uploaded successfully!";
    } else {
            echo "is not an image";
    }
} else {
    echo "Error uploading file! Error code: " . ($_FILES['fileUpload']['error'] ?? 'not set');
}


?>
