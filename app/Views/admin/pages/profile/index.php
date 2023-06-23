<?= $this->extend('admin/layout/mainLayout'); ?>

<?= $this->section('dashboardMenu'); ?>


<div class="w-full">
    <div class="modal-box w-[100vw] ">
        <div class="avatar">
            <div class="w-24 rounded">
                <img src="<?= base_url('img/upload/' . $dataUser['foto']); ?>" />
            </div>
        </div>

        <form action="<?= site_url('api/admin/profile'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PATCH" id="">
            <input type="hidden" name="foto_lama" id="" value="<?= $dataUser['foto']; ?>">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-1">
                    <label for="username">Username</label>
                    <input class="input input-bordered input-success w-full max-w-xs" type="text" name="username" value="<?= $dataUser['username']; ?>" id="username">
                </div>
                <div class="flex flex-col gap-1 ">
                    <label for="foto">Gambar</label>
                    <input class="file-input file-input-bordered file-input-success w-full max-w-xs" type="file" accept="jpg,.jpeg,.png,.webp" name="foto" value="<?= $dataUser['foto']; ?>" id="foto">
                </div>
            </div>
            <div class="mt-4 ">
                <button type="submit" class="btn">Edit</button>
            </div>
        </form>
    </div>
    <?php $errors = session()->getFlashdata('errors') ?>
    <?= $errors; ?>

    <div class="modal-box">
        <form action="<?= site_url('api/admin/profile-pass'); ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PATCH" id="">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-1">
                    <label for="password_lama">Masukan Password Lama</label>
                    <input placeholder="Masukan Password Lama" class="input input-bordered input-success w-full max-w-xs" type="text" name="password_lama" id="password_lama">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="confirm_pass">Password Baru</label>
                    <input class="input input-bordered input-success w-full max-w-xs" type="text" name="confirm_pass" id="confirm_pass">
                    <span class="<?= validation_show_error('confirm_pass') ? '' : 'hidden'; ?> flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        <?= validation_show_error('confirm_pass'); ?>
                    </span>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="confirm_passdua">Confirm Password</label>
                    <input class="input input-bordered input-success w-full max-w-xs" type="text" name="confirm_passdua" id="confirm_passdua">
                    <span class="<?= validation_show_error('confirm_passdua') ? '' : 'hidden'; ?> flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        <?= validation_show_error('confirm_passdua'); ?>
                    </span>
                </div>
            </div>
            <div class="mt-4 ">
                <button type="submit" class="btn">Edit Password</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>