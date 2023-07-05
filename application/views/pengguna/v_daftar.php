<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('dashboard'); ?>" class="btn btn-primary mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><b>Daftar Beasiswa</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('pengguna/pendaftaran/proses_pendaftaran/'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>NIK</label>
                <input type="number" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap (Sesuai KTP)</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Nomor Telepon Aktif/WhatsApp</label>
                <input type="number" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="form-group">
                <label>Semester</label>
                <select class="form-control" id="semester" name="semester" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
            <div class="form-group">
                <label>IPK Terakhir</label>
                <?php
                function generateRandomFloat($min, $max)
                {
                    $rand_float = round($min + mt_rand() / mt_getrandmax() * ($max - $min), 2);
                    return $rand_float;
                }
                $rand_value = generateRandomFloat(0.01, 4.00);

                ?>
                <input type="text" class="form-control" id="number-decimal" name="ipk" autocomplete="off" value="<?php echo "" . $rand_value; ?>" readonly>
            </div>
            <script>
                $(document).on('keyup', '#number-decimal', function(e) {

                    var regex = /[^\d.]|\.(?=.*\.)/g;
                    var subst = "";

                    var str = $(this).val();
                    var result = str.replace(regex, subst);
                    $(this).val(result);

                });
            </script>
            <div class="form-group">
                <label>Beasiswa</label>
                <?php if ($rand_value >= 3.00) { ?>
                    <select class="form-control" id="id_beasiswa" name="id_beasiswa" required>
                        <?php foreach ($bw as $rowbw) : ?>
                            <option value="<?= $rowbw->id_beasiswa; ?>"><?= $rowbw->nama_beasiswa; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php } else { ?>
                    <input type="text" class="form-control" value="Anda tidak bisa mendaftar" readonly>
                <?php } ?>
            </div>
            <div class="form-group">
                <label>Unggah Berkas (Format PDF,DOC,DOCX)</label>
                <?php if ($rand_value >= 3.00) { ?>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="berkas" name="berkas" required>
                            <label class="custom-file-label">Pilih File</label>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#berkas").change(function() {
                                    fileobj = document.getElementById('berkas').files[0];
                                    var fname = fileobj.name;
                                    var ext = fname.split(".").pop().toLowerCase();
                                    if (ext == "pdf" || ext == "docx" || ext == "doc") {
                                        $("#info_berkas").html(fname);
                                    } else {
                                        alert("Hanya menerima file dalam bentuk formart PDF,DOCX,DOC");
                                        $("#berkas").val("");
                                        $("#info_berkas").html("No file selected");
                                        return false;
                                    }
                                });
                                $("#btn_submit").click(function() {
                                    var berkas = $('#berkas').val();
                                    if (berkas == "") {
                                        alert('Unggah berkas dengan benar terlebih dahulu!');
                                        return false;
                                    }
                                });
                            });
                        </script>
                    </div>
                <?php } else { ?>
                    <input type="text" class="form-control" value="Anda tidak bisa mendaftar" readonly>
                <?php } ?>

            </div>
            <?php if ($rand_value >= 3.00) { ?>
                <button type="submit" id="btn_submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Daftar</button>
            <?php } else { ?>
                <button type="button" id="btn_submit" class="btn btn-danger disabled"><i class="fas fa-ban"></i> Tidak Bisa Daftar</button>
            <?php } ?>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->