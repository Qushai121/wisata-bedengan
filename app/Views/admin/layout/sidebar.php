<?php $menuSideBar = [
    [
        'link' => 'profile',
        'keterangan' => [

            'Profile',
        ]
    ],
    [
        'link' => 'dashboard',
        'keterangan' => [

            'dashboard',
        ]
    ],
    [
        'link' => 'Jenis Wisata',
        'keterangan' => [
            [

                'link' => 'jenis-wisata',
                'keterangan' => 'Jenis Wisata',
            ],
            [

                'link' => 'tiket',
                'keterangan' => 'Harga Tiket Wisata',
            ],
            [

                'link' => 'wisata-section',
                'keterangan' => 'Jenis Wisata Section',
            ],
        ]
    ],
    [
        'link' => 'status',
        'keterangan' => [
            'Status',
        ]
    ],
    [
        'link' => 'fasilitas',
        'keterangan' => [
            [
                'link' => 'fasilitas-umum',
                'keterangan' => 'Fasilitas Umum',
            ],
            [
                'link' => 'fasilitas-penyewaan',
                'keterangan' => 'Fasilitas Penyewaan',
            ]

        ]
    ],



] ?>


<?php foreach ($menuSideBar as $value) : ?>
    <?php if (count($value['keterangan']) > 1) : ?>
        <li>
            <div tabindex="0" class="dropdown  dropdown-bottom">
                <label><?= $value['link']; ?></label>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                    <?php foreach ($value['keterangan'] as $keteranganMore) : ?>
                        <li><a class="sidebarLink" href="<?= site_url("admin/{$keteranganMore['link']}"); ?>"><?= $keteranganMore['keterangan'] ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li>
    <?php else : ?>
        <li>
            <a class="sidebarLink" href="<?= site_url("admin/{$value['link']}") ?>"><?= $value['keterangan'][0]; ?></a>
        </li>
    <?php endif; ?>
<?php endforeach ?>

<script>
    $(document).ready(function() {
        const urls = window.location.href

        $('.sidebarLink').each(function() {
            if ($(this).attr('href') == urls) {
                $(this).addClass('bg-secondary');
            }
        });
    });
</script>