<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/jabatan/add/'); ?>" class="btn btn-success mb-3">
    <i class="fas fa-plus-circle"></i> Tambah Jabatan
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><b>Data Jabatan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>Jabatan</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($jab as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $row->nama_jabatan; ?></td>
                        <td class="text-center">
                            <?= anchor('admin/jabatan/edit/' . $row->id_jabatan, '<div class="btn btn-primary"><i class="fas fa-tools"></i> Edit</div>'); ?>
                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= base_url('admin/jabatan/delete/' . $row->id_jabatan) ?>" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>Jabatan</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->