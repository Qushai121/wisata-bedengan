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
                    'img' => 'second.webp',
                    'alt' => 'Foto Cuy',
                ],
                [
                    'img' => 'asdasdsa',
                    'alt' => 'Foto Cuy',
                ],
                [
                    'img' => 'second.webp',
                    'alt' => 'Foto Cuy',
                ],
                [
                    'img' => 'second.webp',
                    'alt' => 'Foto Cuy',
                ],
                [
                    'img' => 'second.webp',
                    'alt' => 'Foto Cuy',
                ],
                [
                    'img' => '',
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
