<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/pemasukan/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Tambah Pemasukan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/pemasukan/insert/'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Pemasukan Dana</label>
                <input type="text" class="form-control" id="nama_pemasukan" name="nama_pemasukan" required>
            </div>
            <div class="form-group">
                <label>Asal Pemasukan Dana</label>
                <input type="text" class="form-control" id="asal_pemasukan" name="asal_pemasukan" required>
            </div>
            <div class="form-group">
                <label>Jumlah Pemasukan Dana</label>
                <input type="number" class="form-control" id="jumlah_pemasukan" name="jumlah_pemasukan" required>
            </div>
            <div class="form-group">
                <label>Tanggal Pemasukan Dana</label>
                <input type="date" class="form-control" id="tgl_pemasukan" name="tgl_pemasukan" required>
            </div>
            <div class="form-group">
                <label>Catatan</label>
                <textarea class="form-control" id="catatan_pemasukan" name="catatan_pemasukan" cols="3"></textarea>
            </div>
            <input type="hidden" name="id_akun" id="id_akun" value="<?= $akun['id_akun']; ?>">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->