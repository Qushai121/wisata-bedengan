<?php

function menuarticles()
{
    $dataMenuArticles = [
        [
            'link' => 'info-lokasi',
            'keterangan' => 'Info & Lokasi'
        ],
        [
            'link' => 'jenis-wisata',
            'keterangan' => 'Jenis Wisata dan Harga Tiket'
        ],
        [
            'link' => 'fasilitas-camp',
            'keterangan' => 'Fasilitas Gratis Fasilitas Penyewaaan'
        ],
        [
            'link' => 'galeri',
            'keterangan' => 'Galeri / Ulasan'
        ]
    ];
    return $dataMenuArticles;
}
