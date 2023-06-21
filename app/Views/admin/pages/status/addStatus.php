<label for="my-status" class="btn w-fit mt-4 mx-6">Tambah Jenis Status</label>

<input type="checkbox" id="my-status" class="modal-toggle" />
<div class="modal">
    <div class="modal-box">
    <?= $this->include('admin/components/formValidasi'); ?>
        <form id="" action="<?= site_url("api/admin/status/add"); ?>" method="post" >
            <?= csrf_field(); ?>
            <?= old('status_detail') ?>
            <div class="h-fit flex flex-col gap-4">
                <label for="status_detail">Keterangan Status </label>
                <input class="input input-bordered input-success w-full max-w-xs" type="text" name="status_detail" value="<?= old('status_detail'); ?>" id="status_detail">
            </div>
            <div class="modal-action">
                <button type="submit" class="btn">Tambah</button>
                <label for="my-status" class="btn">X</label>
            </div>
        </form>
    </div>
</div>