<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/satuan/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Tambah Satuan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/satuan/insert/'); ?>" method="POST">
            <div class="form-group">
                <label>Satuan</label>
                <input type="text" class="form-control" id="nama_satuan" name="nama_satuan">
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->