<?= $this->session->flashdata('message'); ?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Daftar Lembur</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Tanggal Presensi</th>
                    <th>Jam Mulai</th>
                    <th>Jam Berakhir</th>
                    <th>Lama Lembur</th>
                    <th>Bayaran</th>
                    <th>Total di Bayar</th>
                    <th>Catatan</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($lem as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $row->nama_karyawan; ?></td>
                        <td class="text-center"><?= $row->nama_jabatan; ?></td>
                        <td class="text-center"><?= $row->tgl_presensi; ?></td>
                        <td class="text-center"><?= $row->jam_mulai; ?></td>
                        <td class="text-center"><?= $row->jam_selesai; ?></td>
                        <td class="text-center">
                            <?php
                            $awal  = strtotime($row->tgl_presensi . ' ' . $row->jam_mulai); //waktu awal
                            $akhir = strtotime($row->tgl_presensi . ' ' . $row->jam_selesai); //waktu akhir
                            $diff  = $akhir - $awal;
                            $jam   = floor($diff / (60 * 60));
                            $menit = $diff - ($jam * (60 * 60));
                            $detik = $diff % 60;
                            $lama1 = $jam .  '.' . floor($menit / 60);
                            echo $lama = $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                            ?>
                        </td>
                        <td class="text-center">Rp. <?= number_format($row->bayaran, 0, ',', '.'); ?>/jam</td>
                        <td class="text-center">Rp. <?= number_format($total = $row->bayaran * $lama1, 0, ',', '.'); ?></td>
                        <td><?= $row->catatan_lembur; ?></td>
                        <td class="text-center">
                            <?= anchor('admin_lapangan/lembur/edit/' . $row->id_lembur, '<div class="btn btn-primary"><i class="fas fa-tools"></i> Edit</div>'); ?>
                        </td>
                        <td class="text-center">
                            <form action="<?= base_url('admin_lapangan/lembur/reject/') ?>" method="POST">
                                <input type="hidden" name="id_lembur" id="id_lembur" value="<?= $row->id_lembur; ?>">
                                <input type="hidden" name="nik" id="nik" value="<?= $row->nik; ?>">
                                <button type="submit" onclick="return confirm('Yakin ingin membatalkan lembur?')" class="btn btn-danger"><i class="fa fa-times-circle"></i> Batal</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->