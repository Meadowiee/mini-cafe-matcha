<?php
include 'controllers/caffeineType.php';
include 'controllers/toppingType.php';
include 'controllers/sugarLevel.php';
include 'controllers/milkType.php';
include 'controllers/iceLevel.php';

handleFormCaffeineType();
handleFormToppingType();
handleFormSugarLevel();
handleFormMilkType();
handleFormIceLevel();

$caffeine = getCaffeineTypes();
$topping = getToppingTypes();
$sugar = getSugarLevels();
$milk = getMilkTypes();
$ice = getIceLevels();
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
        <div class="starter-template text-light mt-3">
            <h1>Variants</h1>
            <p class="lead text-light">Manage matcha menu's custom personalization</p>
        </div>

        <div class="container mt-0">
            <div class="row">
                <!-- Caffeine Types -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="menu-block-wrap text-center">
                        <div class="text-center mb-4 pb-lg-2">
                            <em class="text-light">What types are you?</em>
                            <h4 class="text-light">Caffeine Types</h4>
                        </div>
                        <div class="menu-block">
                            <?php foreach ($caffeine as $item): ?>
                                <div class="d-flex flex justify-content-between">
                                    <h6><?= htmlspecialchars($item['label']) ?></h6>
                                    <div>
                                        <strong class="ms-2 me-2">IDR <?= htmlspecialchars($item['price']) ?></strong>
                                        <button class="btn btn-sm text-light openModalButton" data-type="caffeine" data-action="update_caffeine"
                                            data-item="<?= htmlspecialchars(json_encode($item)) ?>">
                                            <i class="bi bi-pen"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="border-top mt-2 pt-2 mb-3"></div>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="btn btn-link text-light openModalButton" data-type="caffeine" data-action="add_caffeine">
                            + Add Caffeine Type
                        </button>
                    </div>
                </div>

                <!-- Ice Levels -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="menu-block-wrap text-center">
                        <div class="text-center mb-4 pb-lg-2">
                            <em class="text-light">How cold you want it to be?</em>
                            <h4 class="text-light">Ice Levels</h4>
                        </div>
                        <div class="menu-block">
                            <?php foreach ($ice as $item): ?>
                                <div class="d-flex flex justify-content-between">
                                    <h6><?= htmlspecialchars($item['label']) ?></h6>
                                    <div>
                                        <strong class="ms-2 me-2">IDR <?= htmlspecialchars($item['price']) ?></strong>
                                        <button class="btn btn-sm text-light openModalButton" data-type="ice" data-action="update_ice"
                                            data-item="<?= htmlspecialchars(json_encode($item)) ?>">
                                            <i class="bi bi-pen"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="border-top mt-2 pt-2 mb-3"></div>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="btn btn-link text-light openModalButton" data-type="ice" data-action="add_ice">
                            + Add Ice Level
                        </button>
                    </div>
                </div>

                <!-- Milk Types -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="menu-block-wrap text-center">
                        <div class="text-center mb-4 pb-lg-2">
                            <em class="text-light">Do you have an allergy?</em>
                            <h4 class="text-light">Milk Types</h4>
                        </div>
                        <div class="menu-block">
                            <?php foreach ($milk as $item): ?>
                                <div class="d-flex flex justify-content-between">
                                    <h6><?= htmlspecialchars($item['label']) ?></h6>
                                    <div>
                                        <strong class="ms-2 me-2">IDR <?= htmlspecialchars($item['price']) ?></strong>
                                        <button class="btn btn-sm text-light openModalButton" data-type="milk" data-action="update_milk"
                                            data-item="<?= htmlspecialchars(json_encode($item)) ?>">
                                            <i class="bi bi-pen"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="border-top mt-2 pt-2 mb-3"></div>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="btn btn-link text-light openModalButton" data-type="milk" data-action="add_milk">
                            + Add Milk Type
                        </button>
                    </div>
                </div>

                <!-- Sugar Levels -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="menu-block-wrap text-center">
                        <div class="text-center mb-4 pb-lg-2">
                            <em class="text-light">How sweet do you want it to be?</em>
                            <h4 class="text-light">Sugar Levels</h4>
                        </div>
                        <div class="menu-block">
                            <?php foreach ($sugar as $item): ?>
                                <div class="d-flex flex justify-content-between">
                                    <h6><?= htmlspecialchars($item['label']) ?></h6>
                                    <div>
                                        <strong class="ms-2 me-2">IDR <?= htmlspecialchars($item['price']) ?></strong>
                                        <button class="btn btn-sm text-light openModalButton" data-type="sugar" data-action="update_sugar"
                                            data-item="<?= htmlspecialchars(json_encode($item)) ?>">
                                            <i class="bi bi-pen"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="border-top mt-2 pt-2 mb-3"></div>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="btn btn-link text-light openModalButton" data-type="sugar" data-action="add_sugar">
                            + Add Sugar Level
                        </button>
                    </div>
                </div>

                <!-- Topping Types -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="menu-block-wrap text-center">
                        <div class="text-center mb-4 pb-lg-2">
                            <em class="text-light">Do you want to add something?</em>
                            <h4 class="text-light">Topping Types</h4>
                        </div>
                        <div class="menu-block">
                            <?php foreach ($topping as $item): ?>
                                <div class="d-flex flex justify-content-between">
                                    <h6><?= htmlspecialchars($item['label']) ?></h6>
                                    <div>
                                        <strong class="ms-2 me-2">IDR <?= htmlspecialchars($item['price']) ?></strong>
                                        <button class="btn btn-sm text-light openModalButton" data-type="topping" data-action="update_topping"
                                            data-item="<?= htmlspecialchars(json_encode($item)) ?>">
                                            <i class="bi bi-pen"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="border-top mt-2 pt-2 mb-3"></div>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="btn btn-link text-light openModalButton" data-type="topping" data-action="add_topping">
                            + Add Topping Type
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Edit or Create Variants -->
    <div class="modal fade " id="itemModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="col-lg-6 col-12 mb-4 mb-lg-0 modal-content">
                <div class="card-padding">
                    <div class="pb-lg-2 mb-4">
                        <em id="modal-context"></em>
                        <h4 id="modal-title"></h4>
                    </div>
                    <form method="post" class="custom-form contact-form" id="editForm">
                        <div class="row mb-3">
                            <input type="hidden" name="id" id="item-id">
                            <input type="hidden" name="type" id="item-type">
                            <input type="hidden" name="action" id="item-action">

                            <div class="col-lg-12 col-12">
                                <label for="name" class="form-label text-dark">Label <sup class="text-danger">*</sup></label>
                                <input type="text" name="label" placeholder="Enter label" class="form-control border-secondary" id="item-label" required>
                            </div>
                            <div class="col-lg-12 col-12">
                                <label for="name" class="form-label text-dark">Price (opt.)</label>
                                <input type="number" name="price" placeholder="Enter price" class="form-control border-secondary" id="item-price">
                            </div>
                        </div>
                        <div class="d-flex justify-align-center gap-3">
                            <button name="update" id="update" class="form-control" type="submit">Save</button>
                            <button name="delete" class="form-control" type="submit" id="delete-button" data-operation="delete" style="display: none;">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = new bootstrap.Modal(document.getElementById("itemModal"));
        const form = document.getElementById("itemForm");

        document.querySelectorAll(".openModalButton").forEach(button => {
            button.addEventListener("click", function() {
                const type = this.getAttribute("data-type");
                const action = this.getAttribute("data-action");
                const isEdit = action.includes('update');
                const dataItem = isEdit ? JSON.parse(this.getAttribute("data-item")) : {};

                document.getElementById("modal-context").textContent = isEdit ? "Update Things" : "Create Things";
                document.getElementById("modal-title").textContent = (isEdit ? "Modify " : "New ") + type.charAt(0).toUpperCase() + type.slice(1);

                document.getElementById("item-type").value = type;
                document.getElementById("item-action").value = action;

                document.getElementById("item-id").value = dataItem.id;
                document.getElementById("item-label").value = dataItem.label || "";
                document.getElementById("item-price").value = dataItem.price || "";

                document.getElementById("delete-button").style.display = isEdit ? "inline-block" : "none";

                modal.show();
            });
        });
    });

    document.getElementById("delete-button").addEventListener("click", function() {
        const operation = this.getAttribute("data-operation");
        const type = document.getElementById("item-type").value;
        console.log(type);
        console.log(operation);
        document.getElementById("item-action").value = `${operation}_${type}`;
    });
</script>