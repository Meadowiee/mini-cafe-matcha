<?php
include 'config.php';

// Create new products
function addProduct($name, $description, $category, $size, $price) {
    global $connect;
    $stat = $connect->prepare('INSERT INTO products (name, description, category, size, base_price) VALUES (?, ?, ?, ?, ?)');
    $stat->bind_param('ssssd', $name, $description, $category, $size, $price);
    return $stat->execute();
}

// Read products
function getProducts() {
    global $connect;
    $stat = $connect->prepare('SELECT * FROM products');
    $stat->execute();
    return $stat->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Read product by category
function getProductsByCategory($category) {
    global $connect;
    $stat = $connect->prepare('SELECT * FROM products WHERE category = ?');
    $stat->bind_param('s', $category);
    $stat->execute();
    return $stat->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Update product
function updateProduct($id, $name, $description, $category, $size, $price) {
    global $connect;
    $stat = $connect->prepare('UPDATE products SET name = ?, description = ?, category = ?, size = ?, base_price = ? WHERE id = ?');
    $stat->bind_param('sssdsi', $name, $description, $category, $size, $price, $id);
    return $stat->execute();
}

// Delete product
function deleteProduct($id) {
    global $connect;
    $stat = $connect->prepare('DELETE FROM products WHERE id = ?');
    $stat->bind_param('i', $id);
    return $stat->execute();
}

// Handle form submission
function handleFormProduct() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $_POST['action'] ?? '';
        if ($action == 'add_product') {
            $name = $_POST['name'];
            $description = $_POST['description'] ?? null;
            $category = $_POST['category'];
            $size = $_POST['size'] ?? null;
            $price = $_POST['price'];
            addProduct($name, $description, $category, $size, $price);
        } elseif ($action == 'update_product') {
            $name = $_POST['name'];
            $description = $_POST['description'] ?? null;
            $category = $_POST['category'];
            $size = $_POST['size'] ?? null;
            $price = $_POST['price'];
            $id = $_POST['id'];
            updateProduct($id, $name, $description, $category, $size, $price);
        } elseif ($action == 'delete_product') {
            $id = $_POST['id'];
            deleteProduct($id);
        }
    }
}
