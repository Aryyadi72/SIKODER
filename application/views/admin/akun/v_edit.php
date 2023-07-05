<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/akun/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Pengguna</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/akun/update/'); ?>" method="POST" enctype="multipart/form-data">
            <?php foreach ($peng as $row) : ?>
                <input type="hidden" id="id_akun" name="id_akun" value="<?= $row->id_akun; ?>" readonly>
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?= $row->nama_pengguna; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $row->email; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" id="level" name="level">
                        <option value="<?= $row->level; ?>">--<?= $row->level; ?>--</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Karyawan">Karyawan</option>
                        <option value="Admin Lapangan">Admin Lapangan</option>
                        <option value="Pelanggan">Pelanggan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $row->telepon; ?>">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <div style="width: 250px; height: auto;">
                                <img src="<?= base_url('assets/images/profil/' . $row->foto_profil); ?>" class="img-thumbnail" alt="no pic">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <label>Foto Profil</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto_profil" name="foto_profil">
                                    <label class="custom-file-label">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <?php endforeach; ?>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Perbarui Sandi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/akun/update_password/'); ?>" method="POST">
            <?php foreach ($peng as $row) : ?>
                <input type="hidden" id="id_akun" name="id_akun" value="<?= $row->id_akun; ?>" readonly>
                <div class="form-group">
                    <label>Kata Sandi</label>
                    <input type="text" class="form-control" id="kata_sandi" name="kata_sandi" value="<?= $row->kata_sandi; ?>">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <?php endforeach; ?>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->