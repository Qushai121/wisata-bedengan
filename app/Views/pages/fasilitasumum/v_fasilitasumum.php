<?= $this->extend('layout/pages_layout'); ?>

<?= $this->section('body'); ?>
<div class="flex flex-col lg:mx-44">
    <?php foreach ($fasilitasumums as $fasilitasumum) : ?>
        <div class="lg:flex p-4 bg-stone-200 px-10">
            <div>
                <h1 class="text-2xl font-semibold mb-4 mx-3 ">
                    <?= $fasilitasumum['fasilitasumum_nama']; ?>
                    <span class="badge badge-ghost badge-sm border-2 border-stone-400"><?= $fasilitasumum['status_detail']; ?></span>
                </h1>
                <img class="w-full lg:w-[20vw] rounded-lg" src="<?= base_url("/img/upload/{$fasilitasumum['fasilitasumum_gambar']}"); ?>" alt="">
            </div>
            <div class="flex flex-col gap-2 mt-2 lg:mx-10 lg:mt-12 border-t-2 border-stone-200">
                <div class="mt-2" >
                    <div class="stat-value text-base">
                        Tentang <?= $fasilitasumum['fasilitasumum_nama']; ?>
                    </div>
                    <p><?= $fasilitasumum['fasilitasumum_detail']; ?></p>
                </div>
                <div class="divider -my-[5px]"></div> 
                <div>
                    <div class="stat-value text-base">
                        Lokasi
                    </div>
                    <p><?= $fasilitasumum['fasilitasumum_lokasi']; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?= $this->endSection(); ?>