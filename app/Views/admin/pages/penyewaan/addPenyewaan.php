<label for="my-modal" class="btn w-28 mt-4 mx-6">Tambah Penyewaan</label>

<input type="checkbox" id="my-modal" class="modal-toggle" />

<div class="modal">
    <div class="modal-box">
    <?= $this->include('admin/components/formValidasi'); ?>
        <form id="" action="<?= site_url("api/admin/penyewaan/add"); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="h-fit flex flex-col gap-4">
                <label for="penyewaan_nama">Fasilitas Penyewaan Nama</label>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" name="penyewaan_nama" value="<?= old('penyewaan_nama'); ?>" id="penyewaan_nama">
                <label for="penyewaan_gambar">Gambar</label>
                <input class="file-input file-input-bordered file-input-success w-full max-w-xs" type="file" accept="jpg,.jpeg,.png,.webp" name="penyewaan_gambar" value="<?= old('penyewaan_gambar'); ?>" id="penyewaan_gambar">
                <label for="penyewaan_detail">Detail</label>
                <textarea class="textarea textarea-success" name="penyewaan_detail" value="<?= old('penyewaan_detail'); ?>" id="penyewaan_detail"></textarea>
                <label for="penyewaan_harga">Harga</label>
                <input class="input input-bordered input-success w-full max-w-xs" type="number" name="penyewaan_harga" value="<?= old('penyewaan_harga'); ?>" id="penyewaan_harga"></input>
                <label for="penyewaan_lokasi">lokasi</label>
                <textarea class="textarea textarea-success" name="penyewaan_lokasi" value="<?= old('penyewaan_lokasi'); ?>" id="penyewaan_lokasi"></textarea>
                <label for="penyewaan_status">Status</label>
                <select id="penyewaan_status" name="penyewaan_status" class="select select-success w-full max-w-xs">
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