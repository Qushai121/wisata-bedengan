<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\JeniswisataModel;


class StaticPages extends BaseController
{

    


    public function homeRender()
    {

        $data = [
            'dataForCarosels' => [
                [
                    'img' => 'taman-dan-hutan-highland.jpg',
                    'alt' => 'Foto Cuy',
                ],
                [
                    'img' => 'traveloka-susur-sungai-bogor.jpg',
                    'alt' => 'Foto Cuy',
                ],
                [
                    'img' => 'second.webp',
                    'alt' => 'Foto Cuy',
                ],
                [
                    'img' => 'tempat-camping-di-puncak-ciputri.jpg',
                    'alt' => 'Foto Cuy',
                ],
                [
                    'img' => 'wisata-air-terjun-di-camp-bogor.jpg',
                    'alt' => 'Foto Cuy',
                ],
                [
                    'img' => 'tempat-camping-highland-camp.jpg',
                    'alt' => 'Foto Cuy',
                ],
            ]
        ];
        return view('pages/home/v_home', $data);
    }

    public function infoLokasiRender()
    {
        return view('pages/infolokasi/v_infolokasi');
    }

    

    public function fasilitascampRender()
    {
        $data = [];
        return view('pages/fasilitascamp/v_fasilitascamp', $data);
    }
}
