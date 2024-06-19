<!-- <begin page content> -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('massage'); ?>

    <form action="<?= base_url('menu/update/' . $menu['id']); ?>" method="post">
        <div class="form-group">
            <h6>Menu ID</h6>
            <input type="text" class="form-control" id="menuid" name="menuid" disabled value="<?= $menu['id']; ?>">
            <h6 class="mt-3">Menu Name</h6>
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name" value="<?= $menu['menu']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit Edit</button>
        <a href="<?= base_url('menu') ?>" class="btn-primary" data-dimiss="modal">Back</a>
    </form>
</div>