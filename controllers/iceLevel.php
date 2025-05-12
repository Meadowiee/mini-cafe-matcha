<?php
include 'config.php';

// Create new ice level
function addIceLevel($label, $price) {
    global $connect;
    $stat = $connect->prepare('INSERT INTO ice_levels (label, price) VALUES (?, ?)');
    $stat->bind_param('sd', $label, $price);
    return $stat->execute();
}

// Read ice levels
function getIceLevels() {
    global $connect;
    $stat = $connect->prepare('SELECT * FROM ice_levels');
    $stat->execute();
    return $stat->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Update ice level
function updateIceLevel($id, $label, $price) {
    global $connect;
    $stat = $connect->prepare('UPDATE ice_levels SET label = ?, price = ? WHERE id = ?');
    $stat->bind_param('sdi', $label, $price, $id);
    return $stat->execute();
}

// Delete ice level
function deleteIceLevel($id) {
    global $connect;
    $stat = $connect->prepare('DELETE FROM ice_levels WHERE id = ?');
    $stat->bind_param('i', $id);
    return $stat->execute();
}

// Handle form submission
function handleFormIceLevel() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $_POST['action'] ?? '';
        if ($action == 'add_ice') {
            $label = $_POST['label'];
            $price = $_POST['price'];
            addIceLevel($label, $price);
        } elseif ($action == 'update_ice') {
            $id = $_POST['id'];
            $label = $_POST['label']; 
            $price = $_POST['price']; 
            updateIceLevel($id, $label, $price);
        } elseif ($action == 'delete_ice') {
            $id = $_POST['id'];
            deleteIceLevel($id);
        }
    }
}
