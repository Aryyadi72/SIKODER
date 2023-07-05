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
        <form action="<?= base_url('admin/lembur/update/'); ?>" method="POST" enctype="multipart/form-data">
            <?php foreach ($lem as $row) : ?>
                <input type="hidden" class="form-control" id="id_lembur" name="id_lembur" value="<?= $row->id_lembur; ?>" readonly>
                <div class="form-group">
                    <label>Karyawan</label>
                    <input type="hidden" class="form-control" id="nik" name="nik" value="<?= $row->nik; ?>" readonly>
                    <input type="text" class="form-control" id="karyawan" name="karyawan" value="<?= $row->nama_karyawan . ' | ' . $row->nama_jabatan; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Presensi</label>
                    <input type="date" class="form-control" id="tgl_presensi" name="tgl_presensi" value="<?= $row->tgl_presensi; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Jam Mulai Lembur</label>
                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="<?= $row->jam_mulai; ?>" required>
                </div>
                <div class="form-group">
                    <label>Jam Selesai Lembur</label>
                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="<?= $row->jam_selesai; ?>" required>
                </div>
                <div class="form-group">
                    <label>Bayaran Per Jam (Rp)</label>
                    <input type="number" class="form-control" id="bayaran" name="bayaran" value="<?= $row->bayaran; ?>" required>
                </div>
                <div class="form-group">
                    <label>Catatan Lembur</label>
                    <input type="text" class="form-control" id="catatan_lembur" name="catatan_lembur" value="<?= $row->catatan_lembur; ?>">
                </div>
                <div class="form-group">
                    <label>Apakah sudah selesai?</label>
                    <select class="form-control" id="status" name="status">
                        <option value="
                        <?php
                        if ($row->kegiatan == 2) {
                            echo 'Belum';
                        } else {
                            echo 'Selesai';
                        }
                        ?>
                        ">
                            <?php
                            if ($row->kegiatan == 2) {
                                echo '--Belum--';
                            } else {
                                echo '--Selesai--';
                            }
                            ?></option>
                        <option value="Ya">Ya</option>
                        <option value="Belum">Belum</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Perbarui</button>
            <?php endforeach; ?>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->