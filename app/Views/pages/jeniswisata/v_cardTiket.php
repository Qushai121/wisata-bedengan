<div class=" flex flex-col gap-2 my-5 py-6 border-stone-600 border-y-2">
    <div class="flex justify-center lg:justify-start ">
        <h1 class="text-2xl font-semibold my-4 border-y-2 border-stone-300 px-10 py-1">Kunjungi juga Jenis Wisata Lainnya</h1>
    </div>

    <div class="w-full" >

        <div class="flex apa swiper">
            <div class="swiper-wrapper">

                <?php foreach ($jenisWisatas as $jenisWisata) : ?>
                    <div class="card swiper-slide rounded-none  lg:card-side  bg-base-100 shadow-xl">
                        <div class="card-body ">
                            <h2 class="card-title"><?= $jenisWisata['wisata_nama']; ?></h2>
                            <img class=" h-36 lg:w-[20vw] border-2 border-stone-400  object-cover rounded-lg" src="<?= base_url('img/upload/') . $jenisWisata['wisata_thumbnail']; ?>" alt="<?= $jenisWisata['wisata_thumbnail']; ?>" />
                            <div class="border-2 rounded-lg border-stone-400 p-2" >
                                <p class="line-clamp-6 h-36 "><?= $jenisWisata['wisata_description']; ?></p>
                                <div class="card-actions justify-end">
                                <a href="<?= site_url("jenis-wisata/detail/{$jenisWisata['jeniswisata_id']}"); ?>" class="btn-sm btn my-3">Kunjungi</a>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>

</div>
<!-- 
status_detail
jeniswisata_id
wisata_nama
wisata_thumbnail
wisata_description -->