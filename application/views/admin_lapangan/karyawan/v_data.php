<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Data Karyawan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>ID Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Tempat & Tanggal Lahir</th>
                    <th>Status</th>
                    <th>Foto</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($kar as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $row->nik; ?></td>
                        <td class="text-center"><?= $row->nama_karyawan; ?></td>
                        <td class="text-center"><?= $row->nama_jabatan; ?></td>
                        <td class="text-center"><?= $row->tempat_lahir . ', ' . $row->tgl_lahir; ?></td>
                        <td class="text-center"><?= $row->status_karyawan; ?></td>
                        <td>
                            <div style="width: 100px; height: 100px; display: block; margin-left: auto; margin-right: auto;">
                                <img src="<?= base_url('assets/images/karyawan/' . $row->foto_karyawan); ?>" class="img-thumbnail" alt="no pic">
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>No</th>
                    <th>ID Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Tempat & Tanggal Lahir</th>
                    <th>Status</th>
                    <th>Foto</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->