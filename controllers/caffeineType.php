<?php
include 'config.php';

// Create new caffeine type
function addCaffeineType($label, $price) {
    global $connect;
    $stat = $connect->prepare('INSERT INTO caffeine_types (label, price) VALUES (?, ?)');
    $stat->bind_param('sd', $label, $price);
    return $stat->execute();
}

// Read caffeine types
function getCaffeineTypes() {
    global $connect;
    $stat = $connect->prepare('SELECT * FROM caffeine_types');
    $stat->execute();
    return $stat->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Update caffeine type
function updateCaffeineType($id, $label, $price) {
    global $connect;
    $stat = $connect->prepare('UPDATE caffeine_types SET label = ?, price = ? WHERE id = ?');
    $stat->bind_param('sdi', $label, $price, $id);
    return $stat->execute();
}

// Delete caffeine type
function deleteCaffeineType($id) {
    global $connect;
    $stat = $connect->prepare('DELETE FROM caffeine_types WHERE id = ?');
    $stat->bind_param('i', $id);
    return $stat->execute();
}

// Handle form submission
function handleFormCaffeineType() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $_POST['action'] ?? '';
        if ($action == 'add_caffeine') {
            $label = $_POST['label'];
            $price = $_POST['price'];
            addCaffeineType($label, $price);
        } elseif ($action == 'update_caffeine') {
            $id = $_POST['id'];
            $label = $_POST['label']; 
            $price = $_POST['price']; 
            updateCaffeineType($id, $label, $price);
        } elseif ($action == 'delete_caffeine') {
            $id = $_POST['id'];
            deleteCaffeineType($id);
        }
    }
}
