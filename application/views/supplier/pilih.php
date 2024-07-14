<div class="container">
    <h1>Detail Supplier</h1>
    <p>Nama: <?= $supplier['nama_supplier'] ?></p>
    <p>Alamat: <?= $supplier['alamat_supplier'] ?></p>
    <p>Harga: <?= $supplier['harga_supplier'] ?></p>
    <p>Jenis Barang: <?= $supplier['jenis_barang'] ?></p>
    <a href="<?= site_url('supplier') ?>" class="btn btn-secondary">Kembali</a>
</div>
