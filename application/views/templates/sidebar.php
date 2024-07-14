<ul class="sidebar" id="accordionSidebar">
    <a class="top" href="index.html">
        <div class="logo">
            <i class="fas fa-code"></i>
        </div>
        <div class="title">Sistem Pengadaan</div>
    </a>

    <?php   
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT user_menu.id, menu
                  FROM user_menu 
                  JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id
                  WHERE user_access_menu.role_id = $role_id
                  ORDER BY user_access_menu.menu_id ASC";

    $menu = $this->db->query($queryMenu)->result_array();

    foreach ($menu as $m) :
        // Skip "Management" menu
        if ($m['menu'] == 'Management') continue;

        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                         FROM user_sub_menu 
                         JOIN user_menu ON user_sub_menu.menu_id = user_menu.id
                         WHERE user_sub_menu.menu_id = $menuId
                         AND user_sub_menu.is_active = 1";
        $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>

    <?php endforeach; ?>

    <li class="navitem">
        <a class="navlink" href="<?= base_url('product/index'); ?>">
            <i class="fas fa-box"></i>
            <span class="navtitle">Product</span>
        </a>
    </li>
    <li class="navitem">
        <a class="navlink" href="<?= base_url('supplier/index'); ?>">
            <i class="fas fa-truck"></i>
            <span class="navtitle">Supplier</span>
        </a>
    </li>
    <li class="navitem">
        <a class="navlink" href="<?= base_url('productsupplier/index'); ?>">
            <i class="fas fa-boxes"></i>
            <span class="navtitle">Product Supplier</span>
        </a>
    </li>
    <li class="navitem">
        <a class="navlink" href="<?= base_url('purchaseorder/index'); ?>">
            <i class="fas fa-shopping-cart"></i>
            <span class="navtitle">Purchase Order</span>
        </a>
    </li>
    <li class="navitem">
        <a class="navlink" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span class="navtitle">Logout</span>
        </a>
    </li>

    <div class="button">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>



<link href="<?= base_url('assets/'); ?>css/component/sidebar.css" rel="stylesheet">

<script>
    document.getElementById("sidebarToggle").addEventListener("click", function() {
        document.getElementById("accordionSidebar").classList.toggle("minimized");
    });
</script>
