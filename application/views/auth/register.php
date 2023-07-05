<?= $this->session->flashdata('message'); ?>
<p class="login-box-msg">Registrasi pengguna baru</p>

<form action="<?= base_url('auth/register'); ?>" method="POST">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama_pengguna" id="nama_pengguna">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <?= form_error('nama_pengguna', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="input-group mb-3">
        <input type="number" class="form-control" placeholder="Telepon/WhatsApp" name="telepon" id="telepon">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-phone"></span>
            </div>
        </div>
    </div>
    <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
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
        <input type="password" class="form-control" placeholder="Sandi" name="kata_sandi" id="kata_sandi">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <?= form_error('kata_sandi', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Ulangi Sandi" name="ulangi_sandi" id="ulangi_sandi">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <?= form_error('ulangi_sandi', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="row">

        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-user-plus"></i> Daftar</button>
        </div>
        <div class="col-8">
            <a href="<?= base_url('auth') ?>" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Login Saja</a>
        </div>
        <!-- /.col -->
    </div>
</form>
<!-- /.social-auth-links -->

<p class="mb-1">
    <a href="<?= base_url('dashboard/') ?>">Kembali ke Halaman Awal...</a>
</p>
<!-- <p class="mb-0">
    <a href="<?= base_url('auth/register/') ?>" class="text-center">Registrasi pengguna baru</a>
</p> -->