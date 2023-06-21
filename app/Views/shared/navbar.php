<?php

$dataMenuArticles = [
    [
        'link' => [
            'info-lokasi',
        ],
        'keterangan' => 'Info & Lokasi'
    ],
    [
        'link' => [
            'jenis-wisata',
        ],
        'keterangan' => 'Jenis Wisata & Harga Tiket'
    ],
    [
        'link' => [
            [
                'link' => 'fasilitas-penyewaaan',
                'keterangan' => 'Fasilitas Penyewaaan'
            ],
            [
                'link' => 'fasilitas-umum',
                'keterangan' => 'Fasilitas Umum'
            ],
        ],
        'keterangan' => 'Fasilitas',
    ],
    [
        'link' => [
            'galeri',
        ],
        'keterangan' => 'Galeri / Ulasan'
    ]
];

?>

<div class="navbar border-b-4 shadow-xl border-black">
    <div class="flex-1 ">
        <a class="btn btn-ghost normal-case text-xl">CAMP BEDENGAN</a>
    </div>


    <div class="flex-none hidden lg:block">
        <ul class="menu menu-horizontal px-1">
            <?php if (userLogin() != null) : ?>
                <li>
                    <p><?= userLogin()['username']; ?></p>
                </li>
                <li>
                    <form action="<?= site_url('/api/logout'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Logout</button>
                    </form>
                </li>
            <?php else : ?>
                <li><a href="<?= site_url('register'); ?>">Register</a></li>
            <?php endif; ?>


            <li><a href="<?= site_url('home'); ?>">Home Page</a></li>
            
            <?php foreach ($dataMenuArticles as $dataMenuArticle) : ?>
                <?php if (count($dataMenuArticle['link']) > 1) : ?>
                    <li class="dropdown dropdown-end dropdown-hover">
                        <p tabindex="0" class=" py-4"><?= $dataMenuArticle['keterangan']; ?></p>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                            <?php foreach ($dataMenuArticle['link'] as $dataMenuLink) : ?>
                                <li><a href=<?= site_url($dataMenuLink["link"]); ?>><?= $dataMenuLink['keterangan']; ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href=<?= site_url($dataMenuArticle["link"][0]); ?>><?= $dataMenuArticle['keterangan']; ?></a></li>
                <?php endif ?>
            <?php endforeach; ?>
        </ul>
    </div>




    <!-- NAVBAR UNTUK ANDROID -->
    <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
        </label>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
            <?php if (userLogin() != null) : ?>
                <li>
                    <a><?= userLogin()['username']; ?></a>
                </li>
            <?php else : ?>
                <li><a href="<?= site_url('register'); ?>">Register</a></li>
            <?php endif; ?>

            <?php if (userLogin() != null) : ?>
                <li>
                    <form action="<?= site_url('/api/logout'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Logout</button>
                    </form>
                </li>
            <?php endif ?>

            <li><a href="<?= site_url('home'); ?>">Home Page</a></li>

            <?php foreach ($dataMenuArticles as $dataMenuArticle) : ?>

                <?php if (count($dataMenuArticle['link']) > 1) : ?>
                    <details class="dropdown dropdown-left ">
                        <summary tabindex="0" class=" m-1 btn "><?= $dataMenuArticle['keterangan']; ?></summary>
                        <ul class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                            <?php foreach ($dataMenuArticle['link'] as $dataMenuLink) : ?>
                                <li><a href=<?= site_url($dataMenuLink["link"]); ?>><?= $dataMenuLink['keterangan']; ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </details>
                <?php else : ?>
                    <li><a href=<?= site_url($dataMenuArticle["link"][0]); ?>><?= $dataMenuArticle['keterangan']; ?></a></li>
                <?php endif ?>

            <?php endforeach; ?>
        </ul>
    </div>


</div>
</div>