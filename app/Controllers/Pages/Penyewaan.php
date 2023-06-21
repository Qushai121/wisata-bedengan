<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\PenyewaanModel;

class Penyewaan extends BaseController
{
    protected $PenyewaanModel;

    public function __construct()
    {
        $this->PenyewaanModel = new PenyewaanModel();
    }

    public function penyewaanRender()
    {
        $data = [
            'penyewaans' =>  $this->PenyewaanModel->joinPenyewaanStatusForAll()
        ];

        return view('pages/penyewaan/v_penyewaan',$data);
    }
}
