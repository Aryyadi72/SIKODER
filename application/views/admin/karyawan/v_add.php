<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/karyawan/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Tambah Karyawan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/karyawan/insert/'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan" id="jabatan" required>
                    <option>--Pilih/Cari Jabtan--</option>
                    <?php foreach ($jab as $rowjab) : ?>
                        <option value="<?= $rowjab->id_jabatan; ?>"><?= $rowjab->nama_jabatan; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required>
            </div>
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" id="status_karyawan" name="status_karyawan">
                    <option value="Aktif">Aktif</option>
                    <option value="Cuti">Cuti</option>
                    <option value="Non-Aktif">Non-Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <label>Foto Karyawan</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto_karyawan" name="foto_karyawan" required>
                    <label class="custom-file-label">Pilih Gambar</label>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#foto_karyawan").change(function() {
                            fileobj = document.getElementById('foto_karyawan').files[0];
                            var fname = fileobj.name;
                            var ext = fname.split(".").pop().toLowerCase();
                            if (ext == "jpg" || ext == "png" || ext == "jpeg") {
                                $("#info_thumbnail").html(fname);
                            } else {
                                alert("Hanya menerima file/gambar dalam bentuk formart PNG, JPG, JPEG. Unggah kembali!!!");
                                $("#foto_karyawan").val("");
                                $("#info_thumbnail").html("Tidak ada file yang terpilih");
                                return false;
                            }
                        });
                        $("#btn_submit").click(function() {
                            var foto_karyawan = $('#foto_karyawan').val();
                            if (foto_karyawan == "") {
                                alert('Unggah gambar dengan benar terlebih dahulu!');
                                return false;
                            }
                        });
                    });
                </script>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->