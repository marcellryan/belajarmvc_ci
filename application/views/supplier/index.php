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
            <?php $this->load->view('templates/topbar');?>
            <div class="halaman1" id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Supplier</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Supplier List</h6>
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addSupplierModal">Add Supplier</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Supplier</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="supplierTableBody">
                                        <?php if (!empty($suppliers)): ?>
                                            <?php foreach ($suppliers as $supplier): ?>
                                                <tr>
                                                    <td><?= $supplier->id; ?></td>
                                                    <td><?= $supplier->nama_supplier; ?></td>
                                                    <td><?= $supplier->status; ?></td>
                                                    <td><?= $supplier->created_at; ?></td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm edit-btn" data-id="<?= $supplier->id; ?>">Edit</button>
                                                        <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $supplier->id; ?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">No Suppliers Found</td>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Supplier Modal -->
    <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSupplierModalLabel">Add Supplier</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addSupplierForm">
                        <div class="form-group">
                            <label for="nama_supplier">Nama Supplier:</label>
                            <input type="text" id="nama_supplier" name="nama_supplier" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <textarea id="status" name="status" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            function loadSuppliers() {
                $.ajax({
                    url: "<?= site_url('supplier/get_all_suppliers') ?>",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var tableBody = $("#supplierTableBody");
                        tableBody.empty();

                        data.forEach(function(item) {
                            var row = `<tr>
                                <td>${item.id}</td>
                                <td>${item.nama_supplier}</td>
                                <td>${item.status}</td>
                                <td>${item.created_at}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm edit-btn" data-id="${item.id}">Edit</button>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="${item.id}">Delete</button>
                                </td>
                            </tr>`;
                            tableBody.append(row);
                        });

                        $(".delete-btn").click(function(){
                            var id = $(this).data('id');
                            if (confirm('Are you sure you want to delete this record?')) {
                                $.ajax({
                                    url: "<?= site_url('supplier/delete/') ?>" + id,
                                    type: "POST",
                                    dataType: "json",
                                    success: function(response) {
                                        if (response.status === 'success') {
                                            loadSuppliers();
                                        } else {
                                            alert(response.message);
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(xhr.responseText);
                                        alert("An error occurred while deleting data. Error: " + error);
                                    }
                                });
                            }
                        });

                        $(".edit-btn").click(function(){
                            var id = $(this).data('id');
                            $.ajax({
                                url: "<?= site_url('supplier/edit/') ?>" + id,
                                type: "GET",
                                dataType: "json",
                                success: function(data) {
                                    $("#edit_id").val(data.id);
                                    $("#edit_nama_supplier").val(data.nama_supplier);
                                    $("#edit_status").val(data.status);
                                    $('#editSupplierModal').modal('show');
                                },
                                error: function(xhr, status, error) {
                                    console.log(xhr.responseText);
                                    alert("An error occurred while fetching data. Error: " + error);
                                }
                            });
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert("Failed to load data. Error: " + error);
                    }
                });
            }

            $("#addSupplierForm").submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('supplier/store') ?>",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#addSupplierModal').modal('hide');
                            $('#addSupplierForm')[0].reset();
                            loadSuppliers();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert("An error occurred while adding data. Error: " + error);
                    }
                });
            });

            loadSuppliers();
        });
    </script>
</body>
</html>
