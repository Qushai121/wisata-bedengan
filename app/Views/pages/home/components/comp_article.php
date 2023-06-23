<section class="mx-4 h-fit py-7">
    <div class="xl:flex">
        <div class=" h-fit ">
            <div class="flex swiper apa xl:h-[50vh] xl:w-[40vw]  ">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($dataForCarosels as $dataForCarosel) :  ?>

                        <div class="swiper-slide ">
                            <figure><img class="h-full" src="<?= base_url("/img/{$dataForCarosel['img']}") ?>" alt="<?= $dataForCarosel['alt']; ?>" /></figure>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev "></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <div class="mt-6 mx-4">
            <h1 class="text-2xl font-medium">Selamat Datang Di BEDENGAN</h1>
            <span class="divider-horizontal"></span>
            <div>
                <p>Bumi Perkemahan Bedengan Dau Malang adalah sebuah wisata alam dengan konsep bumi perkemahan. Bagi anak pecinta alam atau penyuka camping, tempat ini pasti sangat cocok untuk habiskan hari-hari libur.</p>
                <span class="divider-horizontal"></span>
                <p>Kami Disini Menyediakan Tempat yang Baik Untuk Pengunjung Dengan Berbagai keunggulan </p>
                <div class="my-4">
                    <ul class="flex flex-col gap-2">
                        <?php foreach (menuarticles() as $dataMenuArticle) : ?>
                            <?php if (count($dataMenuArticle['link']) > 1) : ?>
                                <?php foreach ($dataMenuArticle['link'] as $dataMenuArticleDetail) : ?>
                                    <li class="flex gap-2">
                                        <img class="w-4 rounded-xl" src="<?= base_url('img/icons/arrow-right-solid.svg'); ?>" alt="">
                                        <a href="<?= site_url($dataMenuArticleDetail['link']); ?>" class="underline decoration-blue-500 text-blue-600 "><?= $dataMenuArticleDetail['keterangan']; ?></a>
                                    </li>
                                <?php endforeach ?>
                            <?php else : ?>
                                <li class="flex gap-2">
                                    <img class="w-4 rounded-xl" src="<?= base_url('img/icons/arrow-right-solid.svg'); ?>" alt="">
                                    <a href="<?= site_url($dataMenuArticle['link'][0]); ?>" class="underline decoration-blue-500 text-blue-600 "><?= $dataMenuArticle['keterangan']; ?></a>
                                </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>