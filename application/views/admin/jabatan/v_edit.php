<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/jabatan/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Edit Jabatan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/jabatan/update/'); ?>" method="POST">
            <?php foreach ($jab as $row) : ?>
                <input type="hidden" id="id_jabatan" name="id_jabatan" value="<?= $row->id_jabatan; ?>">
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?= $row->nama_jabatan; ?>">
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Perbarui</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->