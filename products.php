<?php
include 'controllers/product.php';
handleFormProduct();

$drinks = getProductsByCategory('drink');
$desserts = getProductsByCategory('dessert');
$products = getProducts();
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
            <h1>Menu</h1>
            <p class="lead text-light">Manage matcha.cha's drinks and desserts</p>
        </div>

        <div class="container mt-0">
            <div class="d-flex flex justify-content-end">
                <button class="btn btn-light btn-sm rounded-5 mb-2 openModalButton" data-action="add_product">+ Add New Menu</button>
            </div>
            <table class="table rounded-4 custom-table">
                <thead class="text-light">
                    <th scope="col" class="text-center text-light">#</th>
                    <th scope="col" class="text-light">Name</th>
                    <th scope="col" class="text-light">Description</th>
                    <th scope="col" class="text-light">Category</th>
                    <th scope="col" class="text-light">Size</th>
                    <th scope="col" class="text-light">Price</th>
                    <th scope="col" class="text-light">Action</th>
                </thead>
                <tbody>
                    <?php
                    $index = 0;
                    foreach ($products as $product) { ?>
                        <tr>
                            <th scope="row" class="text-center text-light"><?= ++$index ?></th>
                            <td class="text-light"><?= $product['name'] ?></td>
                            <td class="text-light"><?= empty($product['description']) ? '-' : $product['description'] ?></td>
                            <td class="text-light"><?= $product['category'] ?></td>
                            <td class="text-light"><?= empty($product['size']) ? '-' : $product['size'] ?></td>
                            <td class="text-light"><?= $product['base_price'] ?></td>
                            <td>
                                <div class="d-flex flex gap-1">
                                    <button class="btn btn-md text-light openModalButton" data-action="update_product" data-item="<?= htmlspecialchars(json_encode($product)) ?>"><i class="bi bi-pen"></i></button>
                                    <form method="post">
                                        <input type="hidden" name="action" value="delete_product">
                                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                        <button class="btn btn-md text-light"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if (empty((array)$products)) { ?>
                        <tr>
                            <td colspan="7" class="text-center p-3 text-muted">No products found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Create and edit modal product -->
    <div class="modal fade " id="itemModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="z-index: 9999999;">
            <div class="col-lg-6 col-12 mb-4 mb-lg-0 modal-content">
                <div class="card-padding">
                    <div class="pb-lg-2 mb-4">
                        <em id="modal-context"></em>
                        <h4 id="modal-title"></h4>
                    </div>
                    <form method="post" class="custom-form contact-form" id="editForm">
                        <div class="row mb-3">
                            <input type="hidden" name="id" id="item-id">
                            <input type="hidden" name="action" id="item-action">

                            <div class="col-lg-6 col-12">
                                <label for="name" class="form-label text-dark">Name <sup class="text-danger">*</sup></label>
                                <input type="text" id="item-name" name="name" placeholder="Enter name" class="form-control border-secondary" required>
                            </div>
                            <div class="col-lg-6 col-12">
                                <label for="name" class="form-label text-dark">Price <sup class="text-danger">*</sup></label>
                                <input type="number" name="price" placeholder="Enter price" class="form-control border-secondary" id="item-price" required>
                            </div>
                            <div class="col-lg-6 col-12">
                                <label for="size" class="form-label text-dark">Category <sup class="text-danger">*</sup></label>
                                <select class="form-control border-secondary" name="category" id="item-category" required>
                                    <option selected>Select category</option>
                                    <option value="Drink">Drink</option>
                                    <option value="Dessert">Dessert</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-12">
                                <label for="size" class="form-label text-dark">Size (opt.)</label>
                                <select class="form-control border-secondary" name="size" id="item-size">
                                    <option selected>Select size</option>
                                    <option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                </select>
                            </div>
                            <div class="col-lg-12 col-12">
                                <label for="description" class="form-label text-dark">Description</label>
                                <textarea rows="2" id="item-description" name="description" placeholder="Enter description" class="form-control border-secondary"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-align-center gap-3">
                            <button name="update" id="update" class="form-control" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = new bootstrap.Modal(document.getElementById("itemModal"));

        document.querySelectorAll(".openModalButton").forEach(button => {
            button.addEventListener("click", function() {
                const action = this.getAttribute("data-action");
                const isEdit = action.includes("update");

                const dataItem = isEdit ? JSON.parse(this.getAttribute("data-item")) : {};

                document.getElementById("modal-context").textContent = isEdit ? "Update Things" : "Create Things";
                document.getElementById("modal-title").textContent = (isEdit ? "Modify Menu" : "New Menu");

                document.getElementById("item-action").value = action;
                document.getElementById("item-id").value = dataItem.id;

                document.getElementById("item-name").value = dataItem.name || "";
                document.getElementById("item-description").value = dataItem.description || "";
                document.getElementById("item-category").value = dataItem.category || "";
                document.getElementById("item-size").value = dataItem.size || "";
                document.getElementById("item-price").value = dataItem.base_price || "";
                modal.show();
            });
        });
    });
</script>

</html>