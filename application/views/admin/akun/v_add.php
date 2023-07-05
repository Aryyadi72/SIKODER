<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/akun/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Pengguna</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/akun/insert/'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna">
                <?= form_error('nama_pengguna', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Level</label>
                <select class="form-control" id="level" name="level">
                    <option value="Administrator">Administrator</option>
                    <option value="Admin Lapangan">Admin Lapangan</option>
                    <option value="Karyawan">Karyawan</option>
                    <option value="Pelanggan">Pelanggan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="number" class="form-control" id="telepon" name="telepon">
                <?= form_error('telpon', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="text" class="form-control" id="kata_sandi" name="kata_sandi">
                <?= form_error('kata_sandi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->