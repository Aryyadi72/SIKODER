<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/gaji/add/'); ?>" class="btn btn-success mb-3">
    <i class="fas fa-plus-circle"></i> Tambah Gaji Bulanan
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Data Gaji Bulanan Karyawan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                // $total = 0;
                foreach ($gaj as $row) :
                    $total = ($row->pokok * $row->jumlah_jam) - $row->bon; ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $row->nama_karyawan; ?></td>
                        <td class="text-center"><?= $row->nama_jabatan; ?></td>
                        <td class="text-center">Rp. <?= number_format($row->pokok, 0, ',', '.')  ?>/jam</td>
                        <td class="text-center">Rp. <?= number_format($row->bon, 0, ',', '.')  ?></td>
                        <td class="text-center"><?= $row->persen; ?>%</td>
                        <td class="text-center"><?= $row->jumlah_jam; ?> jam/bulan ini</td>
                        <td class="text-center">Rp. <?= number_format($total, 0, ',', '.')  ?></td>
                        <td class="text-center"><?= $row->bulan . ' ' . $row->tahun; ?></td>
                        <td class="text-center">
                            <?= anchor('admin/gaji/edit/' . $row->id_gaji, '<div class="btn btn-primary"><i class="fas fa-tools"></i> Edit</div>'); ?>
                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= base_url('admin/gaji/delete/' . $row->id_gaji) ?>" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="text-center">
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
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->