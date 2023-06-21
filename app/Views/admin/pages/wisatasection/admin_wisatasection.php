<?= $this->extend('admin/layout/mainLayout'); ?>

<?= $this->section('dashboardMenu'); ?>


<?= $this->include('admin/pages/wisatasection/addWisataSection'); ?>


<div class="overflow-x-auto w-full mt-6">
    <table id="tablenih" class="table w-full">
        <!-- head -->
        <thead>
            <tr>
                <th>Judul Wisata Section</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Detail</th>
                <th>JenisWisata</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- row 1 -->
            <?php foreach ($WisataSections as $wisatasection) : ?>
                <tr>
                    <td>
                        <p class="w-52 overflow-auto">
                            <?= $wisatasection['wisatasection_judul']; ?>
                        </p>
                    </td>
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <img src="<?= base_url("/img/upload/{$wisatasection['wisatasection_gambar']}"); ?>" alt="<?= $wisatasection['wisatasection_gambar']; ?>" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold"><?= $wisatasection['wisatasection_gambar']; ?></div>
                            </div>
                        </div>
                    </td>

                    <td>
                        <p class="w-52 overflow-auto">
                            <?= $wisatasection['wisatasection_deskripsi']; ?>
                        </p>
                    </td>

                    <td>
                        <p class="w-52 overflow-auto">
                            <?= $wisatasection['wisatasection_detail']; ?>
                        </p>
                    </td>

                    <td>
                        <p class="w-52 overflow-auto">
                            
                            <?php 
                            foreach($JenisWisatas as $jeniswisata){
                                if($wisatasection['jeniswisata_id'] ==  $jeniswisata['jeniswisata_id']){
                                    echo "<p>{$jeniswisata['wisata_nama']}</p>";
                                }; 
                            }
                            ?>
                        </p>
                    </td>


                    <th class="flex flex-col gap-2 lg:gap-4">
                        <div>
                            <label for="edit<?= $wisatasection['wisatasection_id']; ?>" class="btn btn-secondary btn-xs">EDIT / DETAIL</label>
                            <input type="checkbox" id="edit<?= $wisatasection['wisatasection_id']; ?>" class="modal-toggle" />
                            <div class="modal" id=<?= $wisatasection['wisatasection_id']; ?>>
                                <div class="modal-box h-fit">
                                    <form id="wisatasection" action="<?= site_url("api/admin/wisatasection/{$wisatasection['wisatasection_id']}"); ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="h-fit flex flex-col gap-4">
                                            <input type="hidden" name="wisatasection_gambar_lama" value="<?= $wisatasection['wisatasection_gambar']; ?>">

                                            <label for="wisatasection_nama">Judul Wisata Section</label>
                                            <input class="input input-bordered input-success w-full max-w-xs" type="text" name="wisatasection_judul" value="<?= $wisatasection['wisatasection_judul']; ?>" id="wisatasection_judul">

                                            <label for="wisatasection_gambar">Gambar</label>
                                            <input class="file-input file-input-bordered file-input-success w-full max-w-xs" type="file" accept="jpg,.jpeg,.png,.webp" name="wisatasection_gambar" value="<?= $wisatasection['wisatasection_gambar']; ?>" id="wisatasection_gambar">

                                            <label for="wisatasection_deskripsi">deskripsi</label>
                                            <textarea class="textarea textarea-success" name="wisatasection_deskripsi" id="wisatasection_deskripsi"><?= $wisatasection['wisatasection_deskripsi']; ?></textarea>

                                            <label for="wisatasection_detail">Detail</label>
                                            <textarea class="textarea textarea-success" name="wisatasection_detail" id="wisatasection_detail"><?= $wisatasection['wisatasection_detail']; ?></textarea>

                                            <label for="jeniswisata_id">Jenis Wisata </label>
                                            <select id="jeniswisata_id" name="jeniswisata_id" class="select select-success w-full max-w-xs">
                                                <option disabled selected>Sambungkan Jenis Wisata</option>
                                                <?php foreach ($JenisWisatas as $jeniswisata) : ?>
                                                    <option <?= $jeniswisata['jeniswisata_id'] == $wisatasection['jeniswisata_id'] ? 'selected' : ''; ?> value="<?= $jeniswisata['jeniswisata_id']; ?>"><?= $jeniswisata['wisata_nama']; ?></option>
                                                <?php endforeach ?>
                                            </select>

                                            <div class="modal-action">
                                                <button type="submit" class="btn">
                                                    Edit
                                                </button>
                                                <label for="edit<?= $wisatasection['wisatasection_id']; ?>" class="btn">X</label>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <!-- The button to open modal -->
                            <label for="delete<?= $wisatasection['wisatasection_id']; ?>" class=" btn btn-danger btn-xs">Hapus</label>
                            <input type="checkbox" id="delete<?= $wisatasection['wisatasection_id']; ?>" class="modal-toggle" />
                            <div class="modal" id="delete<?= $wisatasection['wisatasection_id']; ?>">
                                <div class="modal-box">
                                    <h3 class="text-lg font-bold">Apakah Anda Yakin Menghapus ?</h3>
                                    <p class="py-4"><?= $wisatasection['wisatasection_judul']; ?></p>
                                    <form action="<?= site_url("api/admin/wisatasection/delete/{$wisatasection['wisatasection_id']}"); ?>" method="post">

                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-action">
                                            <button type="submit" class="btn btn-danger ">Hapus</button>
                                            <label for="delete<?= $wisatasection['wisatasection_id']; ?>" class="btn">X</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
            <?php endforeach ?>
        </tbody>
        <!-- foot -->
    </table>
</div>
<?= $this->endSection(); ?>