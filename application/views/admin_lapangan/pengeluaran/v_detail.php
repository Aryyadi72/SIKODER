<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin_lapangan/pengeluaran/'); ?>" class="btn btn-success mb-3">
    <i class="fas fa-plus-circle"></i> Tambah Pemasukan
</a>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Data Pemasukan Dana</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php foreach ($peng as $row) : ?>
            <div class="form-group">
                <label>Nomor Pengeluaran</label>
                <input type="text" class="form-control" value="<?= $row->nomor_pengeluaran; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Penanggung Jawab</label>
                <input type="text" class="form-control" value="<?= $row->nama_pengguna; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal pengeluaran Dana</label>
                <input type="date" class="form-control" value="<?= $row->tgl_pengeluaran; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Catatan</label>
                <textarea class="form-control" cols="3" readonly><?= $row->catatan_pengeluaran; ?></textarea>
            </div>
        <?php endforeach; ?>
        <hr>
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Pengeluaran</th>
                    <th>Jumlah Pengeluaran</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                // $total = 0;
                foreach ($pengx as $rowx) :
                    if ($row->nomor_pengeluaran == $rowx->nomor_pengeluaran) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $rowx->pengeluaran_untuk; ?></td>
                            <td class="text-center">Rp. <?= number_format($rowx->jumlah_pengeluaran, 0, ',', '.'); ?></td>
                        </tr>
                <?php }
                endforeach; ?>
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>No</th>
                    <th>Pengeluaran</th>
                    <th>Jumlah Pengeluaran</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->