<label for="tambah-wisata" class="btn w-28 mt-4 mx-6">Tambah Wisata</label>

<input type="checkbox" id="tambah-wisata" class="modal-toggle" />
<div class="modal">
    <div class="modal-box">
        <?= $this->include('admin/components/formValidasi'); ?>
        <!-- The button to open modal -->

        <form id="jenisWisata" action="<?= site_url("api/admin/jenis-wisata/add"); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="h-fit flex flex-col gap-4">
                <label for="wisata_nama">Jenis Wisata</label>
                <input class="input input-bordered w-full input-success max-w-xs" type="text" name="wisata_nama" value="<?= old('wisata_nama'); ?>" id="wisata_nama">
                <label for="wisata_thumbnail">Thumbnail</label>
                <input class="file-input file-input-bordered file-input-success w-full max-w-xs" type="file" accept="jpg,.jpeg,.png,.webp" name="wisata_thumbnail" id="wisata_thumbnail">
                <label for="wisata_description">Deskripsi</label>
                <textarea class="textarea textarea-success" name="wisata_description" id="wisata_description"><?= old('wisata_description'); ?></textarea>
                <label for="wisata_detail">Detail Blog</label>
                <textarea class="textarea textarea-success" name="wisata_detail" class="h-72" id="wisata_detail"><?= old('wisata_detail'); ?></textarea>
                <label for="wisata_status">Status</label>
                <select id="wisata_status" name="wisata_status" class="select select-success w-full max-w-xs">
                    <option disabled selected>Pilih Jenis Status</option>
                    <?php foreach ($Statuss as $Status) : ?>
                        <option value="<?= $Status['status_id']; ?>"><?= $Status['status_detail']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn">Tambah</button>
                <label for="tambah-wisata" class="btn">X</label>
            </div>
        </form>
    </div>
</div>