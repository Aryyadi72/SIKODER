<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/satuan/add/'); ?>" class="btn btn-success mb-3">
    <i class="fas fa-plus-circle"></i> Tambah Satuan
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Data Satuan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>Satuan</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($sat as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $row->nama_satuan; ?></td>
                        <td class="text-center">
                            <?= anchor('admin/satuan/edit/' . $row->id_satuan, '<div class="btn btn-primary"><i class="fas fa-tools"></i> Edit</div>'); ?>
                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= base_url('admin/satuan/delete/' . $row->id_satuan) ?>" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>Satuan</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->