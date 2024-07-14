<div class="container">
    <h2>Pilih Supplier</h2>
    <form action="<?= base_url('supplier/confirm'); ?>" method="post">
        <div class="form-group">
            <label for="supplier">Pilih Supplier:</label>
            <select name="supplier_id" id="supplier" class="form-control">
                <?php foreach ($suppliers as $supplier): ?>
                    <option value="<?= $supplier['id']; ?>">
                        <?= $supplier['nama_supplier']; ?> - <?= $supplier['alamat_supplier']; ?> - <?= $supplier['harga_supplier']; ?> - <?= $supplier['jenis_barang']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Pilih</button>
    </form>
</div>


<link href="<?= base_url('assets/'); ?>css/supplier.css" rel="stylesheet">