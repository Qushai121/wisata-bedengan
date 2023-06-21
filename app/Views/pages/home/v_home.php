<?= $this->extend('layout/pages_layout'); ?>

<?= $this->section('head'); ?>
<link rel="stylesheet" href="<?= base_url('/css/swiper-bundle.min.css'); ?> " />
<script src="<?= base_url('/js/swiper-bundle.min.js'); ?>" defer></script>
<?= $this->endSection(); ?>


<?= $this->section('body'); ?>
<div class="">
    <div class="mt-4">
        <?= $this->include('pages/home/components/comp_header'); ?>
    </div>
</div>
<div>
    <?= $this->include('pages/home/components/comp_article'); ?>
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
                slidesPerView: 2,
                spaceBetween: 70,
            },
            1024: {
                // width:0,
                slidesPerView: 2,
                spaceBetween: 100,
            },
            1536: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
        }


    });
</script>


<?= $this->endSection(); ?>