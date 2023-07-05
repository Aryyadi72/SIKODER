<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/karyawan/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Edit Karyawan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/karyawan/update/'); ?>" method="POST" enctype="multipart/form-data">
            <?php foreach ($kar as $row) : ?>
                <input type="hidden" class="form-control" id="nik" name="nik" value="<?= $row->nik; ?>" readonly>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control" name="jabatan" id="jabatan" required>
                        <option value="<?= $row->id_jabatan; ?>">--<?= $row->nama_jabatan; ?>--</option>
                        <?php foreach ($jab as $rowjab) : ?>
                            <option value="<?= $rowjab->id_jabatan; ?>"><?= $rowjab->nama_jabatan; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?= $row->nama_karyawan; ?>" required>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $row->tempat_lahir; ?>" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $row->tgl_lahir; ?>" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row->alamat; ?>" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" id="status_karyawan" name="status_karyawan">
                        <option value="<?= $row->status_karyawan; ?>">--<?= $row->status_karyawan; ?>--</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Cuti">Cuti</option>
                        <option value="Non-Aktif">Non-Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <div style="width: 250px; height: auto;">
                                <img src="<?= base_url('assets/images/karyawan/' . $row->foto_karyawan); ?>" class="img-thumbnail" alt="no pic">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <label>Foto Karyawan</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto_karyawan" name="foto_karyawan">
                                    <label class="custom-file-label">Pilih Gambar</label>
                                    <input type="hidden" class="form-control" id="foto_karyawanx" name="foto_karyawanx" value="<?= $row->foto_karyawan; ?>" readonly>
                                </div>
                            </div>
                        </div>
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
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Perbarui</button>
            <?php endforeach; ?>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<script>
    $(document).on('keyup', '#number-decimal', function(e) {
        var regex = /[^\d.]|\.(?=.*\.)/g;
        var subst = "";

        var str = $(this).val();
        var result = str.replace(regex, subst);
        $(this).val(result);
    });
</script>