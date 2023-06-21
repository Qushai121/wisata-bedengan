<label for="my-modal" class="btn w-fit mt-4 mx-6">Tambah fasilitas umum</label>

<input type="checkbox" id="my-modal" class="modal-toggle" />

<div class="modal">
    <div class="modal-box">
    <?= $this->include('admin/components/formValidasi'); ?>
        <form id="" action="<?= site_url("api/admin/fasilitasumum/add"); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="h-fit flex flex-col gap-4">
                <label for="fasilitasumum_nama">Fasilitas Umum Nama</label>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" name="fasilitasumum_nama" value="<?= old('fasilitasumum_nama'); ?>" id="fasilitasumum_nama">
                <label for="fasilitasumum_gambar">Gambar</label>
                <input class="file-input file-input-bordered file-input-success w-full max-w-xs" type="file" accept="jpg,.jpeg,.png,.webp" name="fasilitasumum_gambar" value="<?= old('fasilitasumum_gambar'); ?>" id="fasilitasumum_gambar">
                <label for="fasilitasumum_detail">Detail</label>
                <textarea class="textarea textarea-success" name="fasilitasumum_detail" value="<?= old('fasilitasumum_detail'); ?>" id="fasilitasumum_detail"></textarea>
                <label for="fasilitasumum_lokasi">lokasi</label>
                <textarea class="textarea textarea-success" name="fasilitasumum_lokasi" value="<?= old('fasilitasumum_lokasi'); ?>" id="fasilitasumum_lokasi"></textarea>
                <label for="fasilitasumum_status">Fasilitas Umum Status</label>
                <select id="fasilitasumum_status" name="fasilitasumum_status" class="select select-success w-full max-w-xs">
                    <option disabled selected>Pilih Jenis Status</option>
                    <?php foreach ($Statuss as $Status) : ?>
                        <option value="<?= $Status['status_id']; ?>"><?= $Status['status_detail']; ?></option>
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