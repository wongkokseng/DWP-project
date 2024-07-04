<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $price = (float) $_POST['price'];
    $description = $_POST['description'];

    // Handle the image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Get the current products from product.json
    $products = json_decode(file_get_contents('product.json'), true);

    // Create a new product ID
    $new_id = end($products)['id'] + 1;

    // Create a new product array
    $new_product = array(
        "id" => $new_id,
        "name" => $name,
        "price" => $price,
        "image" => $target_file,
        "description" => $description
    );

    // Add the new product to the array
    $products[] = $new_product;

    // Save the updated products array to product.json
    file_put_contents('product.json', json_encode($products, JSON_PRETTY_PRINT));

    // Redirect back to the form with a success query parameter
    header("Location: add_product.html?success=true");
    exit();
} else {
    // If not a POST request, redirect to the form
    header("Location: add_product.html");
    exit();
}
?>
