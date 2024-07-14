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
                    <h1 class="h3 mb-4 text-gray-800">Create Product</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Create New Product</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('product/store') ?>" method="post">
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
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
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
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
</body>
</html>
