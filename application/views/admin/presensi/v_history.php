<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/presensi/'); ?>" class="btn btn-warning mb-3">
    <i class="fas fa-arrow-circle-left"></i> Kembali
</a>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Data Riwayat Presensi Karyawan</b></h3>
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
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($pres as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $row->nama_karyawan; ?></td>
                        <td class="text-center"><?= $row->nama_jabatan; ?></td>
                        <td class="text-center"><?= $row->tgl_presensi; ?></td>
                        <td class="text-center"><?= $row->jam_masuk; ?></td>
                        <td class="text-center"><?= $row->jam_keluar; ?></td>
                        <!-- <td class="text-center">
                            <a href="<?= base_url('admin/presensi/delete/' . $row->id_presensi); ?>" onclick="return confirm('Yakin ingin membatalkan presensi?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                        </td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->