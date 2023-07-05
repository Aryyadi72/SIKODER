<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/pengeluaran/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Edit Data Pengeluaran Dana</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/pengeluaran/update/'); ?>" method="POST" enctype="multipart/form-data">
            <?php foreach ($peng as $row) : ?>
                <input type="hidden" class="form-control" id="id_pengeluaran" name="id_pengeluaran" value="<?= $row->id_pengeluaran; ?>" readonly>
                <div class="form-group">
                    <label>Tanggal pengeluaran Dana</label>
                    <input type="date" class="form-control" id="tgl_pengeluaran" name="tgl_pengeluaran" value="<?= $row->tgl_pengeluaran; ?>" required>
                </div>
                <div class="form-group">
                    <label>Catatan</label>
                    <textarea class="form-control" id="catatan_pengeluaran" name="catatan_pengeluaran" cols="3"><?= $row->catatan_pengeluaran; ?></textarea>
                </div>
                <input type="hidden" name="id_akun" id="id_akun" value="<?= $row->id_akun; ?>">
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Perbarui</button>
            <?php endforeach; ?>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->