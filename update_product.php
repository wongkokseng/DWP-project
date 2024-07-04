<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $imagePath = '';

    // Handle image upload if a new image is provided
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'images/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $imagePath = $uploadFile;
        } else {
            echo json_encode(['success' => false, 'message' => 'Error moving uploaded file.']);
            exit;
        }
    }

    // Read the existing product data
    $products = json_decode(file_get_contents('product.json'), true);

    // Find and update the product
    foreach ($products as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $name;
            $product['price'] = floatval($price);
            $product['description'] = $description;
            if ($imagePath) {
                $product['image'] = $imagePath;
            }
            break;
        }
    }

    // Save the updated product data
    if (file_put_contents('product.json', json_encode($products))) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error saving product data.']);
    }
}
?>
