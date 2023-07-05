<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url('admin/akun/insert/'); ?>" class="btn btn-success mb-3">
    <i class="fas fa-plus-circle"></i> Tambah Pengguna Baru
</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Data Pengguna</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Telepon</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($peng as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $row->nama_pengguna; ?></td>
                        <td class="text-center"><?= $row->email; ?></td>
                        <td class="text-center"><?= $row->level; ?></td>
                        <td class="text-center"><?= $row->telepon; ?></td>
                        <td>
                            <div style="width: 100px; height: 100px; display: block; margin-left: auto; margin-right: auto;">
                                <img src="<?= base_url('assets/images/profil/' . $row->foto_profil); ?>" class="img-thumbnail" alt="no pic">
                            </div>
                        </td>
                        <td class="text-center">
                            <div class=" text-center mb-2">
                                <?= anchor('admin/akun/edit/' . $row->id_akun, '<div class="btn btn-primary"><i class="fas fa-tools"></i> Edit</div>'); ?>
                            </div>
                            <?php if ($row->id_akun == $akun['id_akun']) { ?>
                                <a href="#" class="btn btn-danger btn-circle disabled"><i class="fas fa-exclamation-triangle"></i> Hapus</a>
                            <?php } else {; ?>
                                <a onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= base_url('admin/akun/delete/' . $row->id_akun) ?>" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i> Hapus</a>
                            <?php }; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="text-center">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Telepon</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->