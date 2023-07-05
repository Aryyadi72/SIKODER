<?= $this->session->flashdata('message'); ?>
<?php foreach ($kar as $rowkar) : ?>
    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="pt-2 px-3">
                    <h3 class="card-title">Data Saya</h3>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false"><i class="fas fa-user-tie"></i> Data Karyawan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true"><i class="fas fa-clock"></i> Presensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-lembur-tab" data-toggle="pill" href="#custom-tabs-two-lembur" role="tab" aria-controls="custom-tabs-two-lembur" aria-selected="true"><i class="fas fa-clock"></i> Lembur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-gaji-tab" data-toggle="pill" href="#custom-tabs-two-gaji" role="tab" aria-controls="custom-tabs-two-gaji" aria-selected="true"><i class="fas fa-money-bill-wave"></i> Gaji Saya</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">

                <div class="tab-pane fade show active" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                    <div class="row">
                        <div class="col-lg-5">
                            <div style="width: 100%; height: auto; display: block; margin-left: auto; margin-right: auto;">
                                <img src="<?= base_url('assets/images/karyawan/' . $rowkar->foto_karyawan); ?>" class="img-thumbnail" alt="no pic">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">Judul</th>
                                        <th class="text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ID Karyawan</td>
                                        <td><?= $rowkar->nik; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td><?= $rowkar->nama_karyawan; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td><?= $rowkar->nama_jabatan; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat & Tanggal Lahir</td>
                                        <td><?= $rowkar->tempat_lahir . ', ' . $rowkar->tgl_lahir; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Karyawan</td>
                                        <td><?= $rowkar->status_karyawan; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>Jabatan</th>
                                <th>Tanggal Presensi</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pres as $rowpres) :
                                if ($rowpres->nik == $rowkar->nik) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td class="text-center"><?= $rowpres->nama_karyawan; ?></td>
                                        <td class="text-center"><?= $rowpres->nama_jabatan; ?></td>
                                        <td class="text-center"><?= $rowpres->tgl_presensi; ?></td>
                                        <td class="text-center"><?= $rowpres->jam_masuk; ?></td>
                                        <td class="text-center"><?= $rowpres->jam_keluar; ?></td>
                                    </tr>
                            <?php }
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-lembur" role="tabpanel" aria-labelledby="custom-tabs-two-lembur-tab">
                    <table id="example1-1" class="table table-bordered table-striped">
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
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($lem as $rowlem) :
                                if ($rowlem->nik == $rowkar->nik) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td class="text-center"><?= $rowlem->nama_karyawan; ?></td>
                                        <td class="text-center"><?= $rowlem->nama_jabatan; ?></td>
                                        <td class="text-center"><?= $rowlem->tgl_presensi; ?></td>
                                        <td class="text-center"><?= $rowlem->jam_mulai; ?></td>
                                        <td class="text-center"><?= $rowlem->jam_selesai; ?></td>
                                        <td class="text-center">
                                            <?php
                                            $awal  = strtotime($rowlem->tgl_presensi . ' ' . $rowlem->jam_mulai); //waktu awal
                                            $akhir = strtotime($rowlem->tgl_presensi . ' ' . $rowlem->jam_selesai); //waktu akhir
                                            $diff  = $akhir - $awal;
                                            $jam   = floor($diff / (60 * 60));
                                            $menit = $diff - ($jam * (60 * 60));
                                            $detik = $diff % 60;
                                            $lama1 = $jam .  '.' . floor($menit / 60);
                                            echo $lama = $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                                            ?>
                                        </td>
                                        <td class="text-center">Rp. <?= number_format($rowlem->bayaran, 0, ',', '.'); ?>/jam</td>
                                        <td class="text-center">Rp. <?= number_format($total = $rowlem->bayaran * $lama1, 0, ',', '.'); ?></td>
                                        <td><?= $rowlem->catatan_lembur; ?></td>
                                    </tr>
                            <?php }
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-gaji" role="tabpanel" aria-labelledby="custom-tabs-two-gaji-tab">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>Jabatan</th>
                                <th>Gaji Pokok</th>
                                <th>Bon</th>
                                <th>Persen</th>
                                <th>Jam Kerja</th>
                                <th>Total</th>
                                <th>Gaji Untuk</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            // $total = 0;
                            foreach ($gaj as $rowgaj) :
                                if ($rowgaj->nik == $rowkar->nik) {
                                    $total = ($rowgaj->pokok * $rowgaj->jumlah_jam) - $rowgaj->bon; ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td class="text-center"><?= $rowgaj->nama_karyawan; ?></td>
                                        <td class="text-center"><?= $rowgaj->nama_jabatan; ?></td>
                                        <td class="text-center">Rp. <?= number_format($rowgaj->pokok, 0, ',', '.')  ?>/jam</td>
                                        <td class="text-center">Rp. <?= number_format($rowgaj->bon, 0, ',', '.')  ?></td>
                                        <td class="text-center"><?= $rowgaj->persen; ?>%</td>
                                        <td class="text-center"><?= $rowgaj->jumlah_jam; ?> jam/bulan ini</td>
                                        <td class="text-center">Rp. <?= number_format($total, 0, ',', '.')  ?></td>
                                        <td class="text-center"><?= $rowgaj->bulan . ' ' . $rowgaj->tahun; ?></td>
                                    </tr>
                            <?php }
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>