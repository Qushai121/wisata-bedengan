<section class="flex flex-col gap-2 items-start">
    <?php foreach ($wisataSections as $wisatasection) : ?>
        <p class="text-2xl  font-semibold my-4 border-y-2 border-stone-300 px-10 py-1 "><?= $wisatasection['wisatasection_judul']; ?></p>

        <div style="background-image: none;" class="resepcard lg:flex gap-10 ">
            <img class="w-full rounded-lg " src="<?= base_url("/img/upload/{$wisatasection['wisatasection_gambar']}"); ?>" alt="<?= $wisatasection['wisatasection_gambar']; ?>">
            <div class="flex flex-col gap-2 ">
                <div>
                    <p><?= $wisatasection['wisatasection_deskripsi']; ?></p>
                </div>
                <div>
                    <p><?= $wisatasection['wisatasection_detail']; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</section>