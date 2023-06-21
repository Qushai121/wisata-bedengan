<?php $errors = session()->getFlashdata('errors') ?>
<?php $success = session()->getFlashdata('success') ?>
<div class="toast toast-top z-50 lg:right-32 top-20 toast-end">
    <?php if (isset($errors['error'])) : ?>
        <div class="alert alert-error ">
            <div>
                <p>
                    <?= $errors['error']; ?>
                </p>
                <button class="tutup">X</button>
            </div>
        </div>
    <?php else : ?>
    <?php endif; ?>
    <?php if (isset($success)) : ?>
        <div class="alert alert-success">
            <div>
                <p>
                    <?= $success; ?>
                    <button class="tutup">X</button>
                </p>
            </div>
        </div>
    <?php else : ?>
    <?php endif; ?>
</div>