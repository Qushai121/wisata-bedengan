<?= $this->extend('layout/pages_layout'); ?>



<?= $this->section('body'); ?>
<h1 class="stat-value mx-6 lg:mx-[29rem] mt-4 -mb-4">Jenis Wisata</h1>
<div class="lg:mx-36 flex ">
    <!-- $this->include('pages/jeniswisata/v_jenisWisataFilter'); ?> -->
    <div class="h-full flex flex-col xl:flex-row xl:flex-wrap xl:justify-evenly xl:w-full gap-3 ">
        <?php foreach ($jenisWisatas as $jenisWisata) : ?>
            <div class="h-fit p-5 lg:p-2 lg:px-4 flex flex-col lg:flex-row items-start w-full overflow-hidden ">
                <div class="flex flex-col ">
                    <div class="flex gap-2 lg:w-[16vw]  ">
                        <h2 class="break-words text-2xl font-medium my-3 "><?= $jenisWisata['wisata_nama']; ?></h2>
                        <div class="items-center flex mt-1">
                            <p class="badge badge-ghost bg-base-300 badge-sm"><?= $jenisWisata['status_detail']; ?></p>
                        </div>
                    </div>
                    <img class="rounded-lg h-60 lg:h-52 object-cover w-full " src="<?= base_url("/img/upload/{$jenisWisata['wisata_thumbnail']}"); ?>" alt="">
                    
                </div>
                <?php $hargaTiket = [];?>
                <?php foreach ($jenisWisataBridges as $jenisWisataBridge) {
                    $jenisWisata['jeniswisata_id'] == $jenisWisataBridge['jeniswisata_id'] ? $hargaTiket[] = $jenisWisataBridge['tiket_harga']  : '';
                } ?>
                <div class="lg:mx-5 lg:mt-12">
                    <div class="">
                        <p class="w-full line-clamp-3 lg:line-clamp-5"><?= $jenisWisata['wisata_description']; ?></p>
                        <div class="flex items-center justify-start gap-1 my-1">
                        <p class="text-sm opacity-50">~Diupload oleh</p>
                        <p class="text-sm opacity-50"><?= $jenisWisata['username']; ?></p>
                    </div>
                        <div class="flex">
                            <a href="<?= site_url("/jenis-wisata/detail/{$jenisWisata['jeniswisata_id']}"); ?>" class="btn-sm btn my-3">Kunjungi</a>
                            <?php if (!empty($hargaTiket)) : ?>
                                    <div class="stat flex items-center bg-stone-200 mx-4 rounded-lg overflow-auto w-64 lg:overscroll-none lg:w-fit">
                                        <p class="stat-title">Harga Tiket</p>
                                        <span class="divider -mx-1 divider-horizontal" ></span>
                                        <p class="stat-value text-sm"><?= convertToK(min($hargaTiket))['asli']; ?></p>
                                        <?php if (count($hargaTiket) > 1) : ?>
                                            <p>-</p>
                                            <p class="stat-value text-sm"><?= convertToK(max($hargaTiket))['asli']; ?></p>
                                        <?php endif; ?>
                                    </div>
                            <?php endif ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->include('shared/footer'); ?>

<?= $this->endSection(); ?>