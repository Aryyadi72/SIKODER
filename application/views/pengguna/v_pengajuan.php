<?= $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-lg-6">
        <a href="<?= base_url('dashboard'); ?>" class="btn btn-info mb-3">
            <i class="fas fa-arrow-circle-left"></i> Kembali
        </a>
    </div>
    <div class="col-lg-6">
        <a href="<?= base_url('pengguna/pendaftaran/daftar'); ?>" class="btn btn-success mb-3">
            <i class="fas fa-plus-circle"></i> Daftar Beasiswa
        </a>
    </div>
</div>

</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Laporan Pengajuan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Beasiswa</th>
                    <th>Semester</th>
                    <th>IPK Terakhir</th>
                    <th>Tgl Daftar</th>
                    <th>Berkas</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($pd as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center">
                            <?php
                            if ($row->status == '1') {
                                echo '<a class="btn btn-app bg-warning"><i class="fas fa-sync-alt"></i> Proses</a>';
                            } elseif ($row->status == '2') {
                                echo '<a class="btn btn-app bg-lime"><i class="fas fa-sync-alt"></i> Tervierifikasi</a>';
                            } else {
                                echo '<a class="btn btn-app bg-danger"><i class="fas fa-ban"></i> Ditolak</a>';
                            }
                            ?>
                        </td>
                        <td class="text-center"><?= $row->nik; ?></td>
                        <td class="text-center"><?= $row->nama; ?></td>
                        <td class="text-center"><?= $row->email; ?></td>
                        <td class="text-center"><?= $row->telepon; ?></td>
                        <td class="text-center"><?= $row->nama_beasiswa; ?></td>
                        <td class="text-center"><?= $row->semester; ?></td>
                        <td class="text-center"><?= $row->ipk; ?></td>
                        <td class="text-center"><?= $row->tgl_daftar; ?></td>
                        <td class="text-center"><a href="<?= base_url('assets/berkas/' . $row->berkas); ?>"><i class="fas fa-download"></i> Unduh Berkas</a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Beasiswa</th>
                    <th>Semester</th>
                    <th>IPK Terakhir</th>
                    <th>Tgl Daftar</th>
                    <th>Berkas</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->