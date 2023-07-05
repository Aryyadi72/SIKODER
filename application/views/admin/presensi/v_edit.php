<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/gaji/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Edit Penggajian</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?= base_url('admin/gaji/update/'); ?>" method="POST" enctype="multipart/form-data">
            <?php foreach ($gaj as $row) : ?>
                <input type="hidden" class="form-control" id="id_gaji" name="id_gaji" value="<?= $row->id_gaji; ?>" readonly>
                <div class="form-group">
                    <label>Karyawan</label>
                    <select class="form-control" name="karyawan" id="karyawan" required>
                        <option value="<?= $row->nik; ?>">--<?= $row->nama_karyawan . ' | ' . $row->nama_jabatan; ?>--</option>
                        <?php foreach ($kar as $rowkar) : ?>
                            <option value="<?= $rowkar->nik; ?>"><?= $rowkar->nama_karyawan . ' | ' . $rowkar->nama_jabatan; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Gaji Pokok Perjam</label>
                    <input type="number" class="form-control" id="pokok" name="pokok" value="<?= $row->pokok; ?>" required>
                </div>
                <div class="form-group">
                    <label>Bon</label>
                    <input type="number" class="form-control" id="bon" name="bon" value="<?= $row->bon; ?>" required>
                </div>
                <div class="form-group">
                    <label>Persen</label>
                    <input type="number" class="form-control" id="persen" name="persen" value="<?= $row->persen; ?>" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Jam Kerja</label>
                    <input type="number" class="form-control" id="jumlah_jam" name="jumlah_jam" value="<?= $row->jumlah_jam; ?>" required>
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" maxlength="4" value="<?= $row->tahun; ?>" required>
                </div>
                <div class="form-group">
                    <label>Bulan</label>
                    <select class="form-control" id="bulan" name="bulan">
                        <option value="<?= $row->bulan; ?>">--<?= $row->bulan; ?>--</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="Sepetember">Sepetember</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Perbarui</button>
            <?php endforeach; ?>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->