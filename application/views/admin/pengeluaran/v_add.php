<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/pengeluaran/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Tambah Pengeluaran</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/pengeluaran/insert/'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tanggal Pengeluaran</label>
                <input type="date" class="form-control" id="tgl_pengeluaran" name="tgl_pengeluaran" required>
            </div>
            <div class="form-group">
                <label>Catatan</label>
                <textarea class="form-control" id="catatan_pengeluaran" name="catatan_pengeluaran" cols="3"></textarea>
            </div>
            <input type="hidden" name="id_akun" id="id_akun" value="<?= $akun['id_akun']; ?>">
            <hr>
            <div class="control-group after-add-more">
                <div class="form-group">
                    <label>Pengeluaran Untuk</label>
                    <input type="text" class="form-control" id="pengeluaran_untuk[]" name="pengeluaran_untuk[]" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Pengeluaran (Rp)</label>
                    <input type="number" class="form-control" id="jumlah_pengeluaran[]" name="jumlah_pengeluaran[]" required>
                </div>
                <br>
                <button class="btn btn-success add-more" type="button">
                    <i class="fas fa-plus-circle"></i> Tambah
                </button>
                <hr>
            </div>
            <div class="copy hide">
                <div class="control-group">
                    <div class="form-group">
                        <label>Pengeluaran Untuk</label>
                        <input type="text" class="form-control" id="pengeluaran_untuk[]" name="pengeluaran_untuk[]" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Pengeluaran (Rp)</label>
                        <input type="number" class="form-control" id="jumlah_pengeluaran[]" name="jumlah_pengeluaran[]" required>
                    </div>
                    <br>
                    <button class="btn btn-danger remove" type="button"><i class="fas fa-trash"></i> Hapus</button>
                    <hr>
                </div>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function() {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>