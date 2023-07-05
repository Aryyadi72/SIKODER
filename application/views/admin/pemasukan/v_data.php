<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/pemasukan/add/'); ?>" class="btn btn-success mb-3">
    <i class="fas fa-plus-circle"></i> Tambah Pemasukan
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Data Pemasukan Dana</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Pendata</th>
                    <th>Pemasukan</th>
                    <th>Asal Pemasukan</th>
                    <th>Jumlah Pemasukan</th>
                    <th>Tanggal Pemasukan</th>
                    <th>Catatan</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                // $total = 0;
                foreach ($pems as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $row->nama_pengguna; ?></td>
                        <td class="text-center"><?= $row->nama_pemasukan; ?></td>
                        <td class="text-center"><?= $row->asal_pemasukan; ?></td>
                        <td class="text-center">Rp. <?= number_format($row->jumlah_pemasukan, 0, ',', '.'); ?></td>
                        <td class="text-center"><?= $row->tgl_pemasukan; ?></td>
                        <td><?= $row->catatan_pemasukan; ?></td>
                        <td class="text-center">
                            <?= anchor('admin/pemasukan/edit/' . $row->id_pemasukan, '<div class="btn btn-primary"><i class="fas fa-tools"></i> Edit</div>'); ?>
                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= base_url('admin/pemasukan/delete/' . $row->id_pemasukan) ?>" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>No</th>
                    <th>Pendata</th>
                    <th>Pemasukan</th>
                    <th>Asal Pemasukan</th>
                    <th>Jumlah Pemasukan</th>
                    <th>Tanggal Pemasukan</th>
                    <th>Catatan</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->