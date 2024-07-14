<!DOCTYPE html>
    <html lang="en">
    <head>
        <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300ii,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
        <link href="<?= base_url('assets/css/home.css'); ?>" rel="stylesheet" type="text/css">   

        <style>
            .halaman1 {
                padding-top: 25px;
            }
        </style>
    </head>
    <body id="page-top">
        <div id="wrapper">
            <?php $this->load->view('templates/sidebar'); ?>
            
            <div id="content-wrapper" class="d-flex flex-column">
                <?php $this->load->view('templates/topbar'); ?>
                <div class="halaman1" id="content">
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Product Supplier</h1>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Product Supplier List</h6>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addProductSupplierModal">Add Product Supplier</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Supplier</th>
                                                <th>Nama Product</th>
                                                <th>Harga</th>
                                                <th>Date Created</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productSupplierTableBody">
                                            <?php if (!empty($product_suppliers)): ?>
                                                <?php foreach ($product_suppliers as $ps): ?>
                                                    <tr>
                                                        <td><?= $ps->id; ?></td>
                                                        <td><?= $ps->nama_supplier; ?></td>
                                                        <td><?= $ps->product_name; ?></td>
                                                        <td><?= $ps->harga; ?></td>
                                                        <td><?= $ps->date_created; ?></td>
                                                        <td>
                                                            <button class="btn btn-warning btn-sm edit-btn" data-id="<?= $ps->id; ?>">Edit</button>
                                                            <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $ps->id; ?>">Delete</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="6" class="text-center">No Product Suppliers Found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php $this->load->view('templates/footer'); ?>
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Add Product Supplier Modal -->
        <div class="modal fade" id="addProductSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addProductSupplierModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductSupplierModalLabel">Add Product Supplier</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addProductSupplierForm" action="<?= site_url('productsupplier/store') ?>" method="post">
                            <div class="form-group">
                                <label for="nama_supplier">Nama Supplier:</label>
                                <select id="nama_supplier" name="supplier_id" class="form-control" required>
                                    <?php foreach ($suppliers as $supplier): ?>
                                        <option value="<?= $supplier->id; ?>"><?= $supplier->nama_supplier; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Nama Product:</label>
                                <select id="product_name" name="product_id" class="form-control" required>
                                    <?php foreach ($products as $product): ?>
                                        <option value="<?= $product->product_id; ?>"><?= $product->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="number" class="form-control" id="harga" name="harga" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Product Supplier Modal -->
        <div class="modal fade" id="editProductSupplierModal" tabindex="-1" role="dialog" aria-labelledby="editProductSupplierModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductSupplierModalLabel">Edit Product Supplier</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editProductSupplierForm" action="<?= site_url('productsupplier/update') ?>" method="post">
                            <input type="hidden" id="edit_id" name="id">
                            <div class="form-group">
                                <label for="edit_nama_supplier">Nama Supplier:</label>
                                <select id="edit_nama_supplier" name="supplier_id" class="form-control" required>
                                    <?php foreach ($suppliers as $supplier): ?>
                                        <option value="<?= $supplier->id; ?>"><?= $supplier->nama_supplier; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_product_name">Nama Product:</label>
                                <select id="edit_product_name" name="product_id" class="form-control" required>
                                    <?php foreach ($products as $product): ?>
                                        <option value="<?= $product->id; ?>"><?= $product->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_harga">Harga:</label>
                                <input type="number" class="form-control" id="edit_harga" name="harga" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

        <script>
            $(document).ready(function(){
                function loadProductSuppliers() {
                    $.ajax({
                        url: "<?= site_url('productsupplier/get_product_suppliers') ?>",
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var tableBody = $("#productSupplierTableBody");
                            tableBody.empty();

                            data.forEach(function(item) {
                                var row = `<tr>
                                    <td>${item.id}</td>
                                    <td>${item.nama_supplier}</td>
                                    <td>${item.product_name}</td>
                                    <td>${item.harga}</td>
                                    <td>${item.date_created}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm edit-btn" data-id="${item.id}">Edit</button>
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="${item.id}">Delete</button>
                                    </td>
                                </tr>`;
                                tableBody.append(row);
                            });

                            // Attach event handler for delete buttons
                            $(".delete-btn").click(function(){
                                var id = $(this).data('id');
                                if (confirm('Are you sure you want to delete this record?')) {
                                    $.ajax({
                                        url: "<?= site_url('productsupplier/delete/') ?>" + id,
                                        type: "POST",
                                        dataType: "json",
                                        success: function(response) {
                                            if (response.status === 'success') {
                                                loadProductSuppliers();
                                            } else {
                                                alert(response.message);
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.log(xhr.responseText); // Log the response text for debugging
                                            alert("An error occurred while deleting data. Error: " + error);
                                        }
                                    });
                                }
                            });

                            // Attach event handler for edit buttons
                            $(".edit-btn").click(function(){
                                var id = $(this).data('id');
                                $.ajax({
                                    url: "<?= site_url('productsupplier/edit/') ?>" + id,
                                    type: "GET",
                                    dataType: "json",
                                    success: function(data) {
                                        $("#edit_id").val(data.id);
                                        $("#edit_nama_supplier").val(data.supplier_id);
                                        $("#edit_product_name").val(data.product_id);
                                        $("#edit_harga").val(data.harga);
                                        $('#editProductSupplierModal').modal('show');
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(xhr.responseText); // Log the response text for debugging
                                        alert("An error occurred while fetching data. Error: " + error);
                                    }
                                });
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText); // Log the response text for debugging
                            alert("Failed to load data. Error: " + error);
                        }
                    });
                }

                // Initial load
                loadProductSuppliers();

                $("#addProductSupplierForm").submit(function(event) {
                    event.preventDefault(); // Prevent form from submitting normally

                    var formData = $(this).serialize(); // Get form data

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('productsupplier/store') ?>",
                        data: formData,
                        dataType: "json",
                        success: function(response) {
                            if (response.status === 'success') {
                                $('#addProductSupplierModal').modal('hide');
                                $('#addProductSupplierForm')[0].reset();
                                loadProductSuppliers();
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText); // Log the response text for debugging
                            alert("An error occurred while adding data. Error: " + error);
                        }
                    });
                });

                $("#editProductSupplierForm").submit(function(event) {
                    event.preventDefault(); // Prevent form from submitting normally

                    var formData = $(this).serialize(); // Get form data

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('productsupplier/update') ?>",
                        data: formData,
                        dataType: "json",
                        success: function(response) {
                            console.log("Success response:", response);
                            if (response.status === 'success') {
                                $('#editProductSupplierModal').modal('hide');
                                $('#editProductSupplierForm')[0].reset();
                                loadProductSuppliers();
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Error response:", xhr.responseText);
                            alert("An error occurred while updating data. Error: " + error);
                        }
                    });
                });
            });
        </script>
    </body>
    </html>
