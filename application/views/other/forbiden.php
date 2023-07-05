<div class="error-page">
    <h2 class="headline text-danger">404!</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-danger"></i> Halaman ini memiliki hak akses khusus!</h3>

        <p>
            Anda memerlukan hak akses khusus untuk mengakses halaman ini.
            Mungkin anda bisa logout terlebih dahulu. <a href="<?= base_url('auth/logout/')?>">Klik disini untuk logout</a> atau kembali kehalaman sebelumnya.
        </p>

        <form class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <!-- /.input-group -->
        </form>
    </div>
</div>
<!-- /.error-page -->