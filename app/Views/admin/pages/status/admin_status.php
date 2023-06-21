<?= $this->extend('admin/layout/mainLayout'); ?>

<?= $this->section('dashboardMenu'); ?>
<?= $this->include('admin/pages/status/addStatus'); ?>
<div class="my-3">
    <div class="overflow-x-auto">
        <table id="tablenih" class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Keterangan Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <?php $no = 0; ?>
                <?php foreach ($statuss as $status) : ?>
                    <tr>
                        <th><?= ++$no; ?></th>
                        <td><?= $status['status_detail'] ?></td>
                        <td>
                            <div class="w-52 flex gap-2 overflow-auto">
                                <div>
                                    <!-- The button to open modal -->
                                    <label for="my_statusedit<?= $status['status_id']; ?>" class="btn btn-secondary btn-xs">Edit</label>

                                    <!-- Put this part before </body> tag -->
                                    <input type="checkbox" id="my_statusedit<?= $status['status_id']; ?>" class="modal-toggle" />
                                    <div class="modal">
                                        <div class="modal-box">
                                            <form action="<?= site_url("api/admin/status/{$status['status_id']}"); ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <div class="h-fit flex flex-col gap-4">
                                                    <label for="status_detail">Keterangan Status </label>
                                                    <input class="input input-bordered input-success w-full max-w-xs" type="text" name="status_detail" value="<?= $status['status_detail']; ?>" id="status_detail">
                                                </div>
                                                <div class="modal-action">
                                                    <button type="submit" class="btn">Tambah</button>
                                                    <label for="my_statusedit<?= $status['status_id']; ?>" class="btn">X</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <!-- The button to open modal -->
                                    <label for="my_statusdelete<?= $status['status_id']; ?>" class="btn btn-danger btn-xs">Delete</label>

                                    <!-- Put this part before </body> tag -->
                                    <input type="checkbox" id="my_statusdelete<?= $status['status_id']; ?>" class="modal-toggle" />
                                    <div class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Apakah Anda Yakin Menghapus ?</h3>
                                            <p class="py-4"><?= $status['status_detail']; ?></p>
                                            <form action="<?= site_url("api/admin/status/delete/{$status['status_id']}"); ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <div class="modal-action">

                                                    <button type="submit" class="btn">Hapus</button>
                                                    <label for="my_statusdelete<?= $status['status_id']; ?>" class="btn btn-danger">X</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection(); ?>