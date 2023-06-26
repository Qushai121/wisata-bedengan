<?= $this->extend('layout/pages_layout'); ?>

<?= $this->section('body'); ?>
<div class="flex flex-col lg:flex-row lg:flex-wrap my-5 mx-4 gap-2 h-full ">
    <?php foreach ($penyewaans as $penyewaan) : ?>
        <div class="bg-stone-200 border-2 rounded-lg border-stone-400 p-14">
            <div>
                <h1 class="stat-value"><?= $penyewaan['penyewaan_nama']; ?> <span class="badge badge-ghost badge-sm border-stone-400"><?= $penyewaan['status_detail']; ?></span> </h1>
                
                <h1><?= convertToK($penyewaan['penyewaan_harga'])['asli']; ?></h1>
            </div>
            <img class="rounded-lg w-80" src="<?= base_url("/img/upload/{$penyewaan['penyewaan_gambar']}"); ?>" alt="">
            <div>
                <label for="modal<?= $penyewaan['penyewaan_nama']; ?>" class="btn btn-circle p-3 ">Detail</label>
                <input type="checkbox" id="modal<?= $penyewaan['penyewaan_nama']; ?>" class="modal-toggle" />
                <div class="modal backdrop-blur-sm">
                    <div class="modal-box flex flex-col gap-2">
                        <div>
                            <div class="stat-value text-base">
                                Spesifikasi <?= $penyewaan['penyewaan_nama']; ?>
                            </div>
                            <p class=""><?= $penyewaan['penyewaan_detail']; ?></p>
                        </div>
                        <div>
                            <div class="stat-value text-base">
                                Lokasi
                            </div>
                            <p class=""><?= $penyewaan['penyewaan_lokasi']; ?></p>
                        </div>
                        <div class="modal-action">
                            <label for="modal<?= $penyewaan['penyewaan_nama']; ?>" class="btn">X</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?= $this->endSection(); ?>