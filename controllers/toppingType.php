<?php
include 'config.php';

// Create new topping type
function addToppingType($label, $price) {
    global $connect;
    $stat = $connect->prepare('INSERT INTO topping_types (label, price) VALUES (?, ?)');
    $stat->bind_param('sd', $label, $price);
    return $stat->execute();
}

// Read topping types
function getToppingTypes() {
    global $connect;
    $stat = $connect->prepare('SELECT * FROM topping_types');
    $stat->execute();
    return $stat->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Update topping type
function updateToppingType($id, $label, $price) {
    global $connect;
    $stat = $connect->prepare('UPDATE topping_types SET label = ?, price = ? WHERE id = ?');
    $stat->bind_param('sdi', $label, $price, $id);
    return $stat->execute();
}

// Delete topping type
function deleteToppingType($id) {
    global $connect;
    $stat = $connect->prepare('DELETE FROM topping_types WHERE id = ?');
    $stat->bind_param('i', $id);
    return $stat->execute();
}

// Handle form submission
function handleFormToppingType() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $_POST['action'] ?? '';
        if ($action == 'add_topping') {
            $label = $_POST['label'];
            $price = $_POST['price'];
            addToppingType($label, $price);
        } elseif ($action == 'update_topping') {
            $id = $_POST['id'];
            $label = $_POST['label']; 
            $price = $_POST['price']; 
            updateToppingType($id, $label, $price);
        } elseif ($action == 'delete_topping') {
            $id = $_POST['id'];
            deleteToppingType($id);
        }
    }
}
