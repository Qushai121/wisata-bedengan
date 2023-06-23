<?php

function menuarticles()
{
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
       
    ];
    return $dataMenuArticles;
}
