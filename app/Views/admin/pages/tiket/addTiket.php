<label for="my-modal" class="btn w-28 mt-4 mx-6">Tambah Tiket</label>

<input type="checkbox" id="my-modal" class="modal-toggle" />

<div class="modal">
    <div class="modal-box w-fit px-8">
    <?= $this->include('admin/components/formValidasi'); ?>
        <form action="<?= site_url("api/admin/tiket/add"); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="h-fit flex flex-col gap-4">
                <label for="tiket_nama">Tiket Nama</label>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" name="tiket_nama" value="<?= old('tiket_nama'); ?>" id="">
                <label for="tiket_harga">Tiket Harga</label>
                <input class="input input-bordered input-success w-full max-w-xs" type="number" name="tiket_harga" value="<?= old('tiket_harga'); ?>"></input>
                <label for="tiket_promo">Tiket Promo</label>
                <input class="input input-bordered input-success w-full max-w-xs" type="number" name="tiket_promo" class="h-72" value="<?= old('tiket_promo'); ?>"></input>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn">Tambah</button>
                <label for="my-modal" class="btn">X</label>
            </div>
        </form>
    </div>
</div>