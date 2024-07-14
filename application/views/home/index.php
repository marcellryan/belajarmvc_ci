<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistem Pengadaan</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="<?= base_url('assets/img/home_image.jpg'); ?>" alt="Home Image">
        </div>
        <style>
        .custom-image {
            width: 50px; 
            margin-top: 50px; 
        }
    </style>
        <div class="menu-container">
            <a class="menu-item" href="<?= base_url('product'); ?>">
                <div class="menu-icon">
                    <i class="fas fa-box"></i>
                </div>
                <div class="menu-title">Product</div>
            </a>
            <a class="menu-item" href="<?= base_url('supplier'); ?>">
                <div class="menu-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="menu-title">Supplier</div>
            </a>
            <a class="menu-item" href="<?= base_url('product_supplier'); ?>">
                <div class="menu-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="menu-title">Product Supplier</div>
            </a>
            <a class="menu-item" href="<?= base_url('purchase_order'); ?>">
                <div class="menu-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="menu-title">Purchase Order</div>
            </a>
        </div>
    </div>
</body>
</html>
