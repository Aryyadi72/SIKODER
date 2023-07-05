<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/satuan/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Edit Satuan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/satuan/update/'); ?>" method="POST">
            <?php foreach ($sat as $row) : ?>
                <input type="hidden" id="id_satuan" name="id_satuan" value="<?= $row->id_satuan; ?>">
                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" class="form-control" id="nama_satuan" name="nama_satuan" value="<?= $row->nama_satuan; ?>">
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Perbarui</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->