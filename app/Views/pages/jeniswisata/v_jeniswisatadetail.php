<?= $this->extend('layout/pages_layout'); ?>

<?= $this->section('head'); ?>
<link rel="stylesheet" href="<?= base_url('/css/swiper-bundle.min.css'); ?> " />
<script src="<?= base_url('/js/swiper-bundle.min.js'); ?>" defer></script>
<style>
    .resepcard:nth-of-type(even){
      flex-direction: row-reverse;
  }
</style>
<?= $this->endSection(); ?>

<?= $this->section('body'); ?>

<div class=" flex justify-start ">
    <div class="text-2xl font-semibold my-4 border-y-2 border-stone-300 px-10 py-1 ">
        <a href="<?= site_url('/jenis-wisata'); ?>">
            Jenis Wisata
        </a>
        <span>/</span>
        <a href="#judul">
            <?= $jenisWisataDetail['wisata_nama']; ?>
        </a>
    </div>
</div>
<div class="mx-4  ">
    <div class="lg:flex">
        <div >
            <img class="w-full rounded-lg" src="<?= base_url("/img/upload/{$jenisWisataDetail['wisata_thumbnail']}"); ?>" alt="">
            <h2 id="judul" class="mx-4 mt-4 lg:hidden mb-1 text-[23px] font-medium">
                <?= $jenisWisataDetail['wisata_nama']; ?>
            </h2>
        </div>
        <div class="flex flex-col gap-2 lg:mx-6 lg:w-[70%]">
            <h2 id="judul" class="mx-4 mb-1 hidden lg:block text-[23px] border-y-2 py-1 border-stone-400 px-6 font-medium">
                <?= $jenisWisataDetail['wisata_nama']; ?>
            </h2>
            <p><?= $jenisWisataDetail['wisata_description']; ?></p>
            <div class="stats flex flex-wrap justify-center p-1 lg:stats-horizontal shadow">
                <?php foreach ($jenisWisataDetailTikets as $jenisWisataDetailTiket) : ?>
                    <div class="w-[49%] lg:w-fit">
                        <div class="stat border-[1.5px] h-full w-fit border-stone-200 ">
                            <div class="stat-title font-semibold "><?= $jenisWisataDetailTiket['tiket_nama']; ?></div>
                            <?php $res = convertToK($jenisWisataDetailTiket['tiket_harga'], $jenisWisataDetailTiket['tiket_promo'])  ?>

                            <?php if ($jenisWisataDetailTiket['tiket_promo'] <= 0) : ?>
                                <div class="stat-value ">
                                    <?= $res['asli']; ?>
                                </div>
                            <?php else : ?>
                                <div class="stat-value opacity-40 line-through ">
                                    <?= $res['asli']; ?>
                                </div>
                                <div class="stat-value text-[30px] ">
                                    <?= $res['promo']; ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <p><?= $jenisWisataDetail['wisata_detail']; ?></p>
        </div>
    </div>
    <div>
        <?= $this->include('pages/jeniswisata/v_wisatasection'); ?>
    </div>
</div>


<div>
    <?= $this->include('pages/jeniswisata/v_cardTiket'); ?>
</div>

<div>
    <?= $this->include('shared/footer'); ?>
</div>
<script type="module">
    const swiper = new Swiper('.apa', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        loopFillGroupWithBlank: true,
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            // when window width is >= 640px

            640: {
                // width:0,
                slidesPerView: 2,
                spaceBetween: 200,
            },
            768: {
                // width:0,
                slidesPerView: 3,
                spaceBetween: 70,
            },
            1024: {
                // width:0,
                slidesPerView: 4,
                spaceBetween: 100,
            },
            1536: {
                slidesPerView: 4,
                spaceBetween: 0,
            },
        }


    });
</script>


<?= $this->endSection(); ?>