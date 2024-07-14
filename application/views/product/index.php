<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300ii,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
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
                <h1 class="h3 mb-4 text-gray-800">Product</h1>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addProductModal">Add Product</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah Satuan</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($products)): ?>
                                    <?php foreach ($products as $product): ?>
                                        <tr>
                                            <td><?= $product->product_id; ?></td>
                                            <td><?= $product->nama; ?></td>
                                            <td><?= $product->satuan; ?></td>
                                            <td><?= $product->status; ?></td>
                                            <td><?= $product->created_at; ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm btn-edit" data-id="<?= $product->product_id; ?>" data-toggle="modal" data-target="#editProductModal">Edit</button>
                                                <a href="<?= site_url('product/delete/'.$product->product_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No Products Found</td>
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

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" action="<?= site_url('product/store') ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Obat:</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Jumlah Satuan:</label>
                        <input type="text" id="satuan" name="satuan" class="form-control" required>
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

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" action="<?= site_url('product/update') ?>" method="post">
                    <input type="hidden" id="editProductId" name="product_id">
                    <div class="form-group">
                        <label for="editNama">Nama Obat:</label>
                        <input type="text" id="editNama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editSatuan">Jumlah Satuan:</label>
                        <input type="text" id="editSatuan" name="satuan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editStatus">Status:</label>
                        <textarea id="editStatus" name="status" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= site_url('product/edit') ?>/' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#editProductId').val(data.product_id);
                    $('#editNama').val(data.nama);
                    $('#editSatuan').val(data.satuan);
                    $('#editStatus').val(data.status);
                }
            });
        });
    });
</script>
</body>
</html>
