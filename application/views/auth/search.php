<?= $this->session->flashdata('message'); ?>
<p class="login-box-msg">Masukkan nomor ID karyawan anda di kolom bawah ini...</p>

<form action="<?= base_url('karyawan/karyawan/'); ?>" method="POST">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nomor Id Karyawan" name="nik" id="nik">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="row">

        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Masuk</button>
        </div>
        <!-- /.col -->
    </div>
</form>
<!-- /.social-auth-links -->

<p class="mb-1 mt-2">
    <a href="<?= base_url('auth/') ?>">Login sebagai Admin</a>
</p>