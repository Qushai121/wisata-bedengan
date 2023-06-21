<label for="my-modal" class="btn w-fit mt-4 mx-6">Tambah fasilitas umum</label>

<input type="checkbox" id="my-modal" class="modal-toggle" />

<div class="modal">
    <div class="modal-box">
        <?= $this->include('admin/components/formValidasi'); ?>
        <form id="" action="<?= site_url("api/admin/wisatasection/add"); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="h-fit flex flex-col gap-4">
                <label for="wisatasection_judul">Judul Wisata Section</label>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" name="wisatasection_judul" value="<?= old('wisatasection_judul'); ?>" id="wisatasection_judul">

                <label for="wisatasection_gambar">Gambar</label>
                <input class="file-input file-input-bordered file-input-success w-full max-w-xs" type="file" accept="jpg,.jpeg,.png,.webp" name="wisatasection_gambar" value="<?= old('wisatasection_gambar'); ?>" id="wisatasection_gambar">

                <label for="wisatasection_deskripsi">deskripsi</label>
                <textarea class="textarea textarea-success" name="wisatasection_deskripsi" id="wisatasection_deskripsi"><?= old('wisatasection_deskripsi'); ?></textarea>

                <label for="wisatasection_detail">Detail</label>
                <textarea class="textarea textarea-success" name="wisatasection_detail" id="wisatasection_detail"><?= old('wisatasection_detail'); ?></textarea>

                <label for="jeniswisata_id">Jenis Wisata </label>
                <select id="jeniswisata_id" name="jeniswisata_id" class="select select-success w-full max-w-xs">
                    <option disabled selected>Sambungkan Jenis Wisata</option>
                    <?php foreach ($JenisWisatas as $jeniswisata) : ?>
                        <option value="<?= $jeniswisata['jeniswisata_id']; ?>"><?= $jeniswisata['wisata_nama']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn">Tambah</button>
                <label for="my-modal" class="btn">X</label>
            </div>
        </form>
    </div>
</div>