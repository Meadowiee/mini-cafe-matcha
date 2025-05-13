<?php
include 'controllers/product.php';
include 'controllers/caffeineType.php';
include 'controllers/toppingType.php';
include 'controllers/sugarLevel.php';
include 'controllers/milkType.php';
include 'controllers/iceLevel.php';
include 'controllers/order.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}

$products = getProducts();
$caffeines = getCaffeineTypes();
$toppings = getToppingTypes();
$sugars = getSugarLevels();
$milks = getMilkTypes();
$ices = getIceLevels();

handleCreateOrder();
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

        <div class="starter-template text-light pb-4 mt-3">
            <h1>Order Here</h1>
            <p class="lead text-light">Select your favourite drinks or desserts for today</p>
        </div>

        <div class="container mt-3">
            <div class="row">
                <div class="col-xl-7 col-12">
                    <div class="row">
                        <?php foreach ($products as $product): ?>
                            <div class="col-md-6 mb-3 custom-form">
                                <div class="card border-0">
                                    <div class="card-body p-4">
                                        <h5><?= $product['name'] ?></h5>
                                        <p class="fst-italic"><?= $product['description'] ?></p>
                                        <p class="justify-content-end">IDR <?= $product['base_price'] ?></p>
                                        <button class="form-control" type="submit" data-bs-toggle="modal" data-bs-target="#customizeModal" data-product="<?= htmlspecialchars(json_encode($product)) ?>">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="col-xl-5 col-12">
                    <form action="transaction.php" onsubmit="return prepareForm();" method="post">
                        <input type="hidden" name="action" value="create_order">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                        <input type="hidden" name="total_price" id="total_price_input">
                        <input type="hidden" name="items" id="items_input">

                        <div class="menu-block-wrap text-center">
                            <div class="text-center mb-4 pb-lg-2">
                                <em class="text-light">What do you want to eat?</em>
                                <h4 class="text-light">Cart Items</h4>
                            </div>
                            <div class="menu-block" id="summary">
                            </div>
                            <div class="border-top mt-2 pt-2 mb-3"></div>
                            <div class="d-flex flex justify-content-between">
                                <h6>Total Prices</h6>
                                <p class="ms-2 me-2 text-light" id="total_price">IDR 0</p>
                            </div>
                        </div>

                        <div class="menu-block-wrap text-center mt-3">
                            <div class="menu-block">
                                <div class="custom-form">
                                    <div class="row p-2">
                                        <label class="text-light form-label">Order Method</label>
                                        <select name="order_method" class="form-control" required>
                                            <option value="Pickup">Pickup</option>
                                            <option value="Delivery">Delivery</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="form-control">Check Out</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Custom -->
    <div class="modal fade" id="customizeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content col-lg-6 col-12 mb-4 mb-lg-0 card-padding">
                <div class="mb-2">
                    <em id="modal-context">Customize your order</em>
                    <h4 id="modal-title"></h4>
                </div>
                <div class="custom-form contact-form">
                    <div class="row mb-3">
                        <input type="hidden" id="productId">
                        <input type="hidden" id="productName">
                        <input type="hidden" id="productPrice">

                        <div class="col-lg-6 col-12">
                            <label class="form-label text-dark">Qty <sup class="text-danger">*</sup></label>
                            <input type="number" name="qty" id="quantity" class="form-control border-secondary" value="1" min="1">
                        </div>

                        <div class="col-lg-6 col-12">
                            <label class="form-label text-dark">Ice Level</label>
                            <select class="form-control border-secondary" name="ice" id="ice_level">
                                <option selected>None</option>
                                <?php foreach ($ices as $key): ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-lg-6 col-12">
                            <label class="form-label text-dark">Sugar Level</label>
                            <select class="form-control border-secondary" name="sugar" id="sugar_level">
                                <option selected>None</option>
                                <?php foreach ($sugars as $key): ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-lg-6 col-12">
                            <label class="form-label text-dark">Caffeine Type</label>
                            <select class="form-control border-secondary" name="caffeine" id="caffeine">
                                <option selected>None</option>
                                <?php foreach ($caffeines as $key): ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-lg-6 col-12">
                            <label class="form-label text-dark">Milk Type</label>
                            <select class="form-control border-secondary" name="milk" id="milk_type">
                                <option selected>None</option>
                                <?php foreach ($milks as $key): ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-lg-6 col-12">
                            <label class="form-label text-dark">Topping</label>
                            <select class="form-control border-secondary" name="topping" id="topping">
                                <option selected>None</option>
                                <?php foreach ($toppings as $key): ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['label'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-lg-12 col-12">
                            <label class="form-label text-dark">Additional Request (opt.)</label>
                            <textarea type="text" name="request" id="additional_request" class="form-control border-secondary" rows="3"></textarea>
                        </div>

                        <button type="submit" onclick="addItem()" class="form-control">Add to Cart</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<script>
    let orderItems = [];

    function addItem() {
        const productId = document.getElementById("productId").value ?? 0;
        const productName = document.getElementById("productName").value ?? 0;
        const basePrice = parseInt(document.getElementById("productPrice").value) ?? 0;
        const quantity = parseInt(document.getElementById("quantity").value) ?? 0;
        const sugar = parseInt(document.getElementById("sugar_level").value) ?? 0;
        const ice = parseInt(document.getElementById("ice_level").value) ?? 0;
        const caffeine = parseInt(document.getElementById("caffeine").value) ?? 0;
        const milk = parseInt(document.getElementById("milk_type").value) ?? 0;
        const topping = parseInt(document.getElementById("topping").value) ?? 0;
        const request = document.getElementById("additional_request").value || "";

        const sugarPrice = parseInt(<?= json_encode($sugars) ?>.find(s => s.id == sugar)?.price ?? 0);
        const icePrice = parseInt(<?= json_encode($ices) ?>.find(i => i.id == ice)?.price ?? 0);
        const caffeinePrice = parseInt(<?= json_encode($caffeines) ?>.find(c => c.id == caffeine)?.price ?? 0);
        const milkPrice = parseInt(<?= json_encode($milks) ?>.find(m => m.id == milk)?.price ?? 0);
        const toppingPrice = parseInt(<?= json_encode($toppings) ?>.find(t => t.id == topping)?.price ?? 0);

        console.log('sugarPrice', sugarPrice);
        console.log('icePrice', icePrice);
        console.log('caffeinePrice', caffeinePrice);
        console.log('milkPrice', milkPrice);
        console.log('toppingPrice', toppingPrice);

        const itemPrice = (basePrice * quantity) + sugarPrice + icePrice + caffeinePrice + milkPrice + toppingPrice;

        orderItems.push({
            product_id: productId,
            sugar_level: sugar,
            ice_level: ice,
            caffeine: caffeine,
            milk_type: milk,
            topping: topping,
            quantity: quantity,
            additional_request: request,
            item_price: itemPrice
        });

        console.log('orderItems', orderItems);
        updateSummary();
    }

    function updateSummary() {
        const cart = document.getElementById("summary");
        cart.innerHTML = "";
        let total = 0;

        orderItems.forEach((item, index) => {
            const product = <?= json_encode($products) ?>.find(p => p.id == item.product_id)?.name ?? '';
            const sugar_level = <?= json_encode($sugars) ?>.find(s => s.id == item.sugar_level)?.label ?? '';
            const ice_level = <?= json_encode($ices) ?>.find(i => i.id == item.ice_level)?.label ?? '';
            const caffeine = <?= json_encode($caffeines) ?>.find(c => c.id == item.caffeine)?.label ?? '';
            const milk_type = <?= json_encode($milks) ?>.find(m => m.id == item.milk_type)?.label ?? '';
            const topping = <?= json_encode($toppings) ?>.find(t => t.id == item.topping)?.label ?? '';

            const row =
                `<div class="d-flex flex justify-content-between">
                    <div class="col-6 text-start">
                    <h6 class="text-light">${product}</h6>
                    <p class="fs-6 text-wrap">${sugar_level} | ${ice_level} | ${caffeine} | ${milk_type} | ${topping}</p>
                    </div>
                    <strong class="ms-2 me-2">x ${item.quantity}</strong>
                    <strong class="ms-2 me-2">IDR ${item.item_price}</strong>
                    <div class="border-top mt-2 pt-2 mb-3"></div>
            </div>`;
            cart.innerHTML += row;
            total += item.item_price;
        });

        document.getElementById("total_price").textContent = `IDR ${total}`;
    }

    function prepareForm() {
        const total = orderItems.reduce((sum, item) => sum + item.item_price, 0);
        document.getElementById("total_price_input").value = total.toFixed(2);
        document.getElementById("items_input").value = JSON.stringify(orderItems);

        if (orderItems.length === 0) {
            alert("Please add at least one item.");
            return false;
        }

        return true;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const customizeModal = document.getElementById('customizeModal');

        customizeModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const product = JSON.parse(button.getAttribute('data-product'));

            console.log(product);
            document.getElementById('modal-title').textContent = product.name;
            document.getElementById('productId').value = product.id;
            document.getElementById('productName').value = product.name;
            document.getElementById('productPrice').value = product.base_price;
        });
    });
</script>

</html>