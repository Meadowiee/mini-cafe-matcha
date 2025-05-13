<?php
include 'config.php';

function addOrderItem($order_id, $product_id, $sugar_level, $ice_level, $caffeine, $milk_type, $topping, $additional_request, $quantity, $item_price) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, sugar_level, ice_level, caffeine, milk_type, topping, additional_request, quantity, item_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiiiisid", $order_id, $product_id, $sugar_level, $ice_level, $caffeine, $milk_type, $topping, $additional_request, $quantity, $item_price);
    return $stmt->execute();
}

function updateOrderItem($id, $order_id, $product_id, $sugar_level, $ice_level, $caffeine, $milk_type, $topping, $additional_request, $quantity, $item_price) {
    global $conn;
    $stmt = $conn->prepare("UPDATE order_items SET order_id = ?, product_id = ?, sugar_level = ?, ice_level = ?, caffeine = ?, milk_type = ?, topping = ?, additional_request = ?, quantity = ?, item_price = ? WHERE id = ?");
    $stmt->bind_param("iiiiiiisidi", $order_id, $product_id, $sugar_level, $ice_level, $caffeine, $milk_type, $topping, $additional_request, $quantity, $item_price, $id);
    return $stmt->execute();
}

function getOrderItems() {
    global $conn;
    $sql = "SELECT oi.id, o.order_id, p.product_id, sl.name AS sugar_level, il.name AS ice_level, c.name AS caffeine_level, m.name AS milk_type, t.name as topping_type, 
            oi.additional_request, oi.quantity, oi.item_price FROM order_items oi 
            JOIN orders o ON oi.order_id = o.id JOIN products p ON oi.product_id = p.id JOIN sugar_levels sl ON oi.sugar_level = sl.id JOIN ice_levels il ON oi.ice_level = il.id 
            JOIN caffeine_levels c ON oi.caffeine = c.id JOIN milk_types m ON oi.milk_type = m.id JOIN topping_types t ON oi.topping = t.id";
    $stmt = $conn->query($sql);
    return $stmt->fetch_all(MYSQLI_ASSOC);
}

function getOrderItemsbyOrderId($order_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT oi.id, o.order_id, p.product_id, sl.name AS sugar_level, il.name AS ice_level, c.name AS caffeine_level, m.name AS milk_type, t.name as topping_type, 
            oi.additional_request, oi.quantity, oi.item_price FROM order_items oi 
            JOIN orders o ON oi.order_id = o.id JOIN products p ON oi.product_id = p.id JOIN sugar_levels sl ON oi.sugar_level = sl.id JOIN ice_levels il ON oi.ice_level = il.id 
            JOIN caffeine_levels c ON oi.caffeine = c.id JOIN milk_types m ON oi.milk_type = m.id JOIN topping_types t ON oi.topping = t.id WHERE o.id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function deleteOrderItem($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM order_items WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function handleOrderRequest() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $_POST['action'] ?? '';
        if ($action == 'add_order_item') {
            $order_id = $_POST['order_id'];
            $product_id = $_POST['product_id'];
            $sugar_level = $_POST['sugar_level'] ?? null;
            $ice_level = $_POST['ice_level'] ?? null;
            $caffeine = $_POST['caffeine'] ?? null;
            $milk_type = $_POST['milk_type'] ?? null;
            $topping = $_POST['topping'] ?? null;
            $additional_request = $_POST['additional_request'] ?? null;
            $quantity = $_POST['quantity'];
            $item_price = $_POST['item_price'];
            addOrderItem($order_id, $product_id, $sugar_level, $ice_level, $caffeine, $milk_type, $topping, $additional_request, $quantity, $item_price);
        } elseif ($action == 'update_order_item') {
            $id = $_POST['id'];
            $order_id = $_POST['order_id'];
            $product_id = $_POST['product_id'];
            $sugar_level = $_POST['sugar_level'] ?? null;
            $ice_level = $_POST['ice_level'] ?? null;
            $caffeine = $_POST['caffeine'] ?? null;
            $milk_type = $_POST['milk_type'] ?? null;
            $topping = $_POST['topping'] ?? null;
            $additional_request = $_POST['additional_request'] ?? null;
            $quantity = $_POST['quantity'];
            $item_price = $_POST['item_price'];
            updateOrderItem($id, $order_id, $product_id, $sugar_level, $ice_level, $caffeine, $milk_type, $topping, $additional_request, $quantity, $item_price);
        } elseif ($action == 'delete_order_item') {
            $id = $_POST['id'];
            deleteOrderItem($id);
        }
    }
}