<?= $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-lg-6">
        <a href="<?= base_url('admin_lapangan/presensi/add/'); ?>" class="btn btn-success mb-3">
            <i class="fas fa-plus-circle"></i> Tambah
        </a>
    </div>
    <div class="col-lg-6 text-right">
        <a href="<?= base_url('admin_lapangan/presensi/history/'); ?>" class="btn btn-secondary mb-3">
            <i class="fas fa-clock"></i> Riwayat Semua Presensi
        </a>
    </div>
</div>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Presensi Tanggal : <?= date('d-M-Y'); ?></b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Lembur</th>
                    <th>Batal</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                // $total = 0;
                foreach ($kar as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $row->nama_karyawan; ?></td>
                        <td class="text-center"><?= $row->nama_jabatan; ?></td>
                        <td class="text-center">
                            <?php if ($row->kegiatan == 0) { ?>
                                <form action="<?= base_url('admin_lapangan/presensi/in/') ?>" method="POST">
                                    <input type="hidden" name="nik" id="nik" value="<?= $row->nik; ?>">
                                    <button type="submit" onclick="return confirm('Lakukan Presensi Masuk?')" class="btn btn-primary"><i class="fa fa-hard-hat"></i> Masuk</button>
                                </form>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary disabled"><i class="fa fa-hard-hat"></i> Masuk</button>
                            <?php }  ?>
                        </td>
                        <td class="text-center">
                            <?php if ($row->kegiatan == 1) {
                                foreach ($pres as $rowpres) :
                                    if ($rowpres->nik == $row->nik) { ?>
                                        <form action="<?= base_url('admin_lapangan/presensi/out/') ?>" method="POST">
                                            <input type="hidden" name="id_presensi" id="id_presensi" value="<?= $rowpres->id_presensi; ?>">
                                            <input type="hidden" name="nik" id="nik" value="<?= $rowpres->nik; ?>">
                                            <button type="submit" onclick="return confirm('Lakukan Presensi Masuk?')" class="btn btn-success"><i class="fa fa-home"></i> Pulang</button>
                                        </form>
                                <?php }
                                endforeach;
                            } else { ?>
                                <button type="submit" class="btn btn-success disabled"><i class="fa fa-home"></i> Pulang</button>
                            <?php }  ?>
                        </td>
                        <td class="text-center">
                            <?php if ($row->kegiatan == 1) {
                                foreach ($pres as $rowpres) :
                                    if ($rowpres->nik == $row->nik) { ?>
                                        <form action="<?= base_url('admin_lapangan/lembur/in') ?>" method="POST">
                                            <input type="hidden" name="id_presensi" id="id_presensi" value="<?= $rowpres->id_presensi; ?>">
                                            <input type="hidden" name="nik" id="nik" value="<?= $rowpres->nik; ?>">
                                            <button type="submit" onclick="return confirm('Apakah anda lembur?')" class="btn btn-warning"><i class="fa fa-clock"></i> Lembur</button>
                                        </form>
                                <?php }
                                endforeach;
                            } else { ?>
                                <button type="submit" class="btn btn-warning disabled"><i class="fa fa-clock"></i> Lembur</button>
                            <?php }  ?>
                        </td>
                        <td class="text-center">
                            <?php if ($row->kegiatan == 1) {
                                foreach ($pres as $rowpres) :
                                    if ($rowpres->nik == $row->nik) { ?>
                                        <form action="<?= base_url('admin_lapangan/presensi/reject/') ?>" method="POST">
                                            <input type="hidden" name="id_presensi" id="id_presensi" value="<?= $rowpres->id_presensi; ?>">
                                            <input type="hidden" name="nik" id="nik" value="<?= $rowpres->nik; ?>">
                                            <button type="submit" onclick="return confirm('Yakin ingin membatalkan presensi?')" class="btn btn-danger"><i class="fa fa-times-circle"></i> Batal</button>
                                        </form>
                                <?php }
                                endforeach;
                            } else { ?>
                                <button type="submit" class="btn btn-danger disabled"><i class="fa fa-times-circle"></i> Batal</button>
                            <?php }  ?>
                        </td>

                        <!-- <td class="text-center">
                            <?= anchor('admin_lapangan/presensi/edit/' . $row->id_presensi, '<div class="btn btn-primary"><i class="fas fa-tools"></i> Edit</div>'); ?>
                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= base_url('admin_lapangan/presensi/delete/' . $row->id_presensi) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                        </td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Lembur</th>
                    <th>Batal</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->