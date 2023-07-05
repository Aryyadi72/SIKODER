<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin_lapangan/pengeluaran/add/'); ?>" class="btn btn-success mb-3">
    <i class="fas fa-plus-circle"></i> Tambah Pengeluaran
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Data Pengeluaran Dana</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Pendata</th>
                    <th>Nomor Nota</th>
                    <th>Tanggal pengeluaran</th>
                    <th>Catatan</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                // $total = 0;
                foreach ($peng as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $row->nama_pengguna; ?></td>
                        <td class="text-center"><?= $row->nomor_pengeluaran; ?></td>
                        <!-- <td class="text-center">Rp. <?= number_format($row->jumlah_pengeluaran, 0, ',', '.'); ?></td> -->
                        <td class="text-center"><?= $row->tgl_pengeluaran; ?></td>
                        <td><?= $row->catatan_pengeluaran; ?></td>
                        <td class="text-center">
                            <?= anchor('admin_lapangan/pengeluaran/detail/' . $row->id_pengeluaran, '<div class="btn btn-info"><i class="fas fa-info-circle"></i> Detail</div>'); ?>
                        </td>
                        <td class="text-center">
                            <?= anchor('admin_lapangan/pengeluaran/edit/' . $row->id_pengeluaran, '<div class="btn btn-primary"><i class="fas fa-tools"></i> Edit</div>'); ?>
                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= base_url('admin_lapangan/pengeluaran/delete/' . $row->nomor_pengeluaran) ?>" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>No</th>
                    <th>Pendata</th>
                    <th>Nomor Nota</th>
                    <th>Tanggal pengeluaran</th>
                    <th>Catatan</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->