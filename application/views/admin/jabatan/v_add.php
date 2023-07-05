<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/jabatan/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Tambah Jabatan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/jabatan/insert/'); ?>" method="POST">
            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan">
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->