<?php
include 'controllers/order.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}

$orders = getOrders();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matcha.cha</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/vegas.min.js"></script>
    <script src="js/custom.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/vegas.min.css" rel="stylesheet">
    <link href="css/tooplate-barista.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body style="background-color: #9CAD8C;">
    <main>
        <?php include 'components/admin-navbar.php'; ?>
        <div class="starter-template text-light mt-3 pb-3">
            <h1>Orders</h1>
            <p class="lead text-light">Manage matcha.cha's customer order</p>
        </div>

        <div class="container mt-0">
            <div class="d-flex flex justify-content-end">
                <a class="btn btn-light btn-sm rounded-5 mb-2" href="transaction.php">+ Add New Order</a>
            </div>
            <table class="table rounded-4 custom-table">
                <thead>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Order Method</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Created At</th>
                    <th scope="col" class="text-center">Action</th>
                </thead>
                <tbody>
                    <?php
                    $index = 0;
                    foreach ($orders as $order):
                        $items = getOrderItems($order['id']);
                        $order['items'] = $items;
                    ?>
                        <tr>
                            <td class="text-center"><?= ++$index ?></td>
                            <td><?= $order['id'] ?></td>
                            <td><?= $order['user_id'] ?></td>
                            <td><?= $order['order_method'] ?></td>
                            <td>IDR <?= $order['total_price'] ?></td>
                            <td><?= date('Y-m-d H:i:s', strtotime($order['created_at'])) ?></td>
                            <td class='text-center'>
                                <button type="button" class="btn btn-sm text-light" data-bs-toggle="modal" data-bs-target="#orderModal" data-order="<?= htmlspecialchars(json_encode($order)) ?>">
                                    <i class="bi bi-search"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="col-lg-6 col-12 mb-4 mb-lg-0 modal-content">
                <div class="card-padding">
                    <div class="row mb-3">
                        <div class="col-lg-5 col-12">
                            <div class="pb-lg-2 mb-4">
                                <em id="modal-context">View the details</em>
                                <h4 id="modal-title"></h4>
                            </div>
                            <h6>Customer ID</h6>
                            <p id="user-id"></p>
                            <h6>Order Method</h6>
                            <p id="order-method"></p>
                            <h6>Created At</h6>
                            <p id="created-at"></p>
                        </div>
                        <div class="col-lg-7 col-12 mt-5 pt-2">
                            <h6>Order Items</h6>
                            <div class="menu-block">
                                <div id="order-items-menu"></div>
                                <div class="d-flex flex justify-content-between">
                                    <div class="col-4">
                                        <h6 class="text-muted fs-5">Total Bills </h6>
                                    </div>
                                    <strong class="ms-2 me-2" id="total-price"></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const orderModal = document.getElementById('orderModal');

        orderModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const order = JSON.parse(button.getAttribute('data-order'));
            const items = order.items;

            console.log('order', order);
            console.log('items', items);
            document.getElementById('modal-title').textContent = `Order ID ${order.id}`;
            document.getElementById('user-id').textContent = order.user_id;
            document.getElementById('order-method').textContent = order.order_method;
            document.getElementById('created-at').textContent = new Date(order.created_at).toLocaleString();
            document.getElementById('total-price').textContent = `IDR ${order.total_price}`;

            const orderItemsMenu = document.getElementById('order-items-menu');
            orderItemsMenu.innerHTML = '';
            items.forEach(item => {
                console.log(item);
                const itemDiv = document.createElement('div');
                itemDiv.className = 'menu-item';
                itemDiv.innerHTML = `
                    <div class="d-flex flex justify-content-between">
                    <div class="col-6">
                        <h6 class="text-muted fs-5">${item.product_id}</h6>
                        <p class="fs-6 text-wrap">${item.sugar_level ?? ''} | ${item.ice_level ?? ''} |
                         ${item.caffeine ?? ''} | ${item.milk_type ?? ''} | ${item.topping ?? ''}</p>
                    </div>
                    <strong class="ms-2 me-2">x ${item.quantity}</strong>
                    <strong class="ms-2 me-2">IDR ${item.item_price}</strong>
                    </div>
                `;
                orderItemsMenu.appendChild(itemDiv);
            });
        });
    });
</script>