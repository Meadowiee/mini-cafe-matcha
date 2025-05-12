<?php
include 'config.php';

// Create new sugar level
function addSugarLevel($label, $price) {
    global $connect;
    $stat = $connect->prepare('INSERT INTO sugar_levels (label, price) VALUES (?, ?)');
    $stat->bind_param('sd', $label, $price);
    return $stat->execute();
}

// Read sugar levels
function getSugarLevels() {
    global $connect;
    $stat = $connect->prepare('SELECT * FROM sugar_levels');
    $stat->execute();
    return $stat->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Update sugar level
function updateSugarLevel($id, $label, $price) {
    global $connect;
    $stat = $connect->prepare('UPDATE sugar_levels SET label = ?, price = ? WHERE id = ?');
    $stat->bind_param('sdi', $label, $price, $id);
    return $stat->execute();
}

// Delete sugar level
function deleteSugarLevel($id) {
    global $connect;
    $stat = $connect->prepare('DELETE FROM sugar_levels WHERE id = ?');
    $stat->bind_param('i', $id);
    return $stat->execute();
}

// Handle form submission
function handleFormSugarLevel() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $_POST['action'] ?? '';
        if ($action == 'add_sugar') {
            $label = $_POST['label'];
            $price = $_POST['price'];
            addSugarLevel($label, $price);
        } elseif ($action == 'update_sugar') {
            $id = $_POST['id'];
            $label = $_POST['label']; 
            $price = $_POST['price']; 
            updateSugarLevel($id, $label, $price);
        } elseif ($action == 'delete_sugar') {
            $id = $_POST['id'];
            deleteSugarLevel($id);
        }
    }
}
