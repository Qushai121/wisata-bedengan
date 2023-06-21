<?php

function convertToK(int $data, int $promo = 0): array
{
    $hargaConvert = [];
    $dataPromo = $data - $promo;
    if ($data >= 1000) {
        $hargaConvert['promo'] =  'Rp.' . $dataPromo / 1000 . "k";
        $hargaConvert['asli'] =  'Rp.' . $data / 1000 . "k";
    } else {
        $hargaConvert['asli'] = 'Rp.' . $dataPromo;
    }
    

    return $hargaConvert;
}
