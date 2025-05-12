<?php $current = basename($_SERVER['PHP_SELF']); ?>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="images/matcha.jpeg" width="10px" class="navbar-brand-image img-fluid">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($current == 'index.php') ? 'active' : '' ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current == 'products.php') ? 'active' : '' ?>" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current == 'variants.php') ? 'active' : '' ?>" href="variants.php">Variants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current == 'order-list.php') ? 'active' : '' ?>" href="order-list.php">Order List</a>
                </li>
            </ul>

            <div class="ms-lg-3">
                <a class="btn custom-btn custom-border-btn" href="reservation.html">
                    New Order
                    <i class="bi-arrow-up-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</nav>