<?php
include 'config.php';

// Create new milk type
function addMilkType($label, $price) {
    global $connect;
    $stat = $connect->prepare('INSERT INTO milk_types (label, price) VALUES (?, ?)');
    $stat->bind_param('sd', $label, $price);
    return $stat->execute();
}

// Read milk types
function getMilkTypes() {
    global $connect;
    $stat = $connect->prepare('SELECT * FROM milk_types');
    $stat->execute();
    return $stat->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Update milk type
function updateMilkType($id, $label, $price) {
    global $connect;
    $stat = $connect->prepare('UPDATE milk_types SET label = ?, price = ? WHERE id = ?');
    $stat->bind_param('sdi', $label, $price, $id);
    return $stat->execute();
}

// Delete milk type
function deleteMilkType($id) {
    global $connect;
    $stat = $connect->prepare('DELETE FROM milk_types WHERE id = ?');
    $stat->bind_param('i', $id);
    return $stat->execute();
}

// Handle form submission
function handleFormMilkType() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $_POST['action'] ?? '';
        if ($action == 'add_milk') {
            $label = $_POST['label'];
            $price = $_POST['price'];
            addMilkType($label, $price);
        } elseif ($action == 'update_milk') {
            $id = $_POST['id'];
            $label = $_POST['label']; 
            $price = $_POST['price']; 
            updateMilkType($id, $label, $price);
        } elseif ($action == 'delete_milk') {
            $id = $_POST['id'];
            deleteMilkType($id);
        }
    }
}
