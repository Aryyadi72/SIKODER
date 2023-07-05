<?= $this->session->flashdata('message'); ?>
<p class="login-box-msg">Jika anda memiliki sudah melakukan pengajuan, silahkan isi NIK anda dengan benar, lalu klik lihat. Jika belum pernah membuat pengajuan, maka klik daftar</p>

<form action="<?= base_url('pengguna/pendaftaran/pengajuan/'); ?>" method="POST">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Masukkan NIK anda disini" name="nik" id="nik">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- /.col -->
        <div class="col-lg-6 mb-2">
            <button type="submit" class="btn btn-info btn-block"><i class="fas fa-search"></i> Lihat</button>
        </div>
        <div class="col-lg-6 mb-2">
            <a href="<?= base_url('pengguna/pendaftaran/daftar/');?>" class="btn btn-success btn-block"><i class="fas fa-user-plus"></i> Daftar</a>
        </div>
        <!-- /.col -->
    </div>
</form>
<!-- /.social-auth-links -->

<p class="mb-1">
    <a href="<?= base_url('dashboard') ?>">Kembali ke Beranda Awal...</a>
</p>