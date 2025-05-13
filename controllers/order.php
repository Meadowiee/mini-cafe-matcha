<?php
include 'config.php';

function createOrder($userId, $orderMethod, $totalPrice)
{
    global $connect;
    $stmt = $connect->prepare("INSERT INTO orders (user_id, order_method, total_price, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("isd", $userId, $orderMethod, $totalPrice);
    $stmt->execute();
    return $connect->insert_id;
}

function addOrderItem($orderId, $productId, $sugar, $ice, $caffeine, $milk, $topping, $request, $qty, $itemPrice)
{
    global $connect;
    $stmt = $connect->prepare("INSERT INTO order_items (order_id, product_id, sugar_level, ice_level, caffeine, milk_type, topping, additional_request, quantity, item_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiiiisid", $orderId, $productId, $sugar, $ice, $caffeine, $milk, $topping, $request, $qty, $itemPrice);
    return $stmt->execute();
}

function getOrders()
{
    global $connect;
    $query = "SELECT o.id, u.username AS user_id, o.order_method, o.total_price, o.created_at FROM orders o JOIN users u ON o.user_id = u.id ORDER BY created_at DESC";
    return $connect->query($query)->fetch_all(MYSQLI_ASSOC);
}

function getOrderItems($orderId)
{
    global $connect;
    $stmt = $connect->prepare("SELECT oi.id, p.name AS product_id, sl.label AS sugar_level, il.label AS ice_level, ct.label AS caffeine, mt.label AS milk_type, tt.label AS topping, oi.quantity, oi.item_price 
    FROM order_items oi 
    LEFT JOIN products p ON oi.product_id = p.id
    LEFT JOIN sugar_levels sl ON oi.sugar_level = sl.id
    LEFT JOIN ice_levels il ON oi.ice_level = il.id
    LEFT JOIN caffeine_types ct ON oi.caffeine = ct.id
    LEFT JOIN milk_types mt ON oi.milk_type = mt.id
    LEFT JOIN topping_types tt ON oi.topping = tt.id
    WHERE order_id = ?");
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function handleCreateOrder()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userId = $_POST['user_id'];
        $orderMethod = $_POST['order_method'];
        $totalPrice = $_POST['total_price'];

        $orderId = createOrder($userId, $orderMethod, $totalPrice);

        // FIX: decode the JSON string into a PHP array
        $itemsJson = $_POST['items'];
        $items = json_decode($itemsJson, true); // true = decode as associative array

        if (is_array($items)) {
            foreach ($items as $item) {
                addOrderItem(
                    $orderId,
                    $item['product_id'],
                    $item['sugar_level'],
                    $item['ice_level'],
                    $item['caffeine'],
                    $item['milk_type'],
                    $item['topping'],
                    $item['additional_request'],
                    $item['quantity'],
                    $item['item_price']
                );
            }
            return true;
        } else {
            error_log("Failed to decode items JSON: " . $itemsJson);
        }
    }
}
