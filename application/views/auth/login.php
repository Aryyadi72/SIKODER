<?= $this->session->flashdata('message'); ?>
<p class="login-box-msg">Masuk untuk Memulai Sesi, namun jika belum punya akun, klik daftar...</p>

<form action="<?= base_url('auth/'); ?>" method="POST">
    <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="kata_sandi" id="kata_sandi">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <?= form_error('kata_sandi', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="row">
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i> Cari</button>
        </div>
    </div>
</form>
<!-- /.social-auth-links -->

<p class="mb-1 mt-2">
    <a href="<?= base_url('auth/search/') ?>">Masuk sebagai Karyawan</a>
</p>