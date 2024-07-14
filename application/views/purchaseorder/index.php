<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300ii,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/home.css') ?>" rel="stylesheet" type="text/css">
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
                <h1 class="h3 mb-4 text-gray-800">Purchase Order</h1>
        
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Purchase Order List</h6>
                    </div>
                    <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPOModal">Add PO</button>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>PO ID</th>
                                    <th>PO Number</th>
                                    <th>Supplier</th>
                                    <th>Total Tagihan</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($orders)): ?>
                                    <?php foreach ($orders as $order): ?>
                                        <tr>
                                            <td><?= $order->po_id; ?></td>
                                            <td><?= $order->po_number; ?></td>
                                            <td><?= $order->supplier_name; ?></td>
                                            <td><?= $order->total_tagihan; ?></td>
                                            <td><button class="btn btn-info btn-detail" data-id="<?= $order->po_id; ?>">Details</button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No Orders Found</td>
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

<!-- Add PO Modal -->
<div class="modal fade" id="addPOModal" tabindex="-1" role="dialog" aria-labelledby="addPOModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPOModalLabel">Add Purchase Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addPOForm">
          <div class="form-group">
            <label for="po_number">PO Number</label>
            <input type="text" class="form-control" id="po_number" name="po_number" required>
          </div>
          <div class="form-group">
            <label for="request_number">Request Number</label>
            <input type="text" class="form-control" id="request_number" name="request_number" required>
          </div>
          <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select class="form-control" id="supplier_id" name="supplier_id" required>
              <option value="">Select Supplier</option>
              <?php foreach ($suppliers as $supplier): ?>
                <option value="<?= $supplier->id ?>"><?= $supplier->nama_supplier ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="productTable">Products</label>
            <table class="table table-bordered" id="productTable">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select class="form-control product-select" name="product_id[]">
                      <option value="">Select Product</option>
                    </select>
                  </td>
                  <td><input type="text" class="form-control product-price" name="price[]" readonly></td>
                  <td><input type="number" class="form-control" name="qty[]" required></td>
                  <td><button type="button" class="btn btn-danger btn-remove">Remove</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="savePO">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Purchase Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Details will be loaded here dynamically -->
        <div id="detailContent"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

        $('.btn-detail').on('click', function() {
            var po_id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('purchaseorder/details/') ?>' + po_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = '<table class="table table-bordered">';
                    html += '<tr><th>PO ID</th><td>' + data[0].po_id + '</td></tr>';
                    html += '<tr><th>PO Number</th><td>' + data[0].po_number + '</td></tr>';
                    html += '<tr><th>Supplier</th><td>' + data[0].nama_supplier + '</td></tr>';
                    html += '<tr><th>Total Tagihan</th><td>' + data[0].total_tagihan + '</td></tr>';
                    html += '<tr><th>PO Details</th><td><table class="table table-bordered">';
                    html += '<tr><th>Product ID</th><th>Price</th><th>Qty</th><th>Status</th><th>Date Created</th></tr>';
                    $.each(data, function(index, detail) {
                        html += '<tr>';
                        html += '<td>' + detail.product_id + '</td>';
                        html += '<td>' + detail.price + '</td>';
                        html += '<td>' + detail.qty + '</td>';
                        html += '<td>' + detail.status + '</td>';
                        html += '<td>' + detail.date_created + '</td>';
                        html += '</tr>';
                    });
                    html += '</table></td></tr>';
                    html += '</table>';

                    $('#detailContent').html(html);
                    $('#detailModal').modal('show');
                }
            });
        });
    });
</script>
</body>
</html>
