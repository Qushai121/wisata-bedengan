<?php $errors = session()->getFlashdata('errors') ?>
        <?php if (isset($errors['validasi'])) : ?>
            <div class="bg-error w-fit flex flex-col gap-1 rounded-md text-stone-300 mb-4">
                <div class="mx-4 py-2 w-fit">
                    <?php foreach ($errors['validasi'] as $error) : ?>
                        <div class="">
                            <?= $error; ?>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endif ?>