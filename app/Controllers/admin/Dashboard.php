<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FasilitasUmumModel;
use App\Models\JeniswisataModel;
use App\Models\PenyewaanModel;
use App\Models\WisataSectionModel;

class Dashboard extends BaseController
{
    protected $JeniswisataModel, $WisataSectionModel, $FasilitasUmumModel, $PenyewaanModel;

    public function __construct()
    {
        $this->JeniswisataModel = new JeniswisataModel();
        $this->WisataSectionModel = new WisataSectionModel();
        $this->FasilitasUmumModel = new FasilitasUmumModel();
        $this->PenyewaanModel = new PenyewaanModel();
    }

    public function dashboardMenuRender()
    {
        $data = [
            'JenisWisatas' => count($this->JeniswisataModel->where(['user_id' => session('user_id')])->select('jeniswisata_id')->findAll()),
            'WisataSections' => count($this->WisataSectionModel->where(['user_id' => session('user_id')])->select('wisatasection_id')->findAll()),
            'FasilitasUmums' => count($this->FasilitasUmumModel->where(['user_id' => session('user_id')])->select('fasilitasumum_id')->findAll()),
            'Penyewaans' => count($this->PenyewaanModel->where(['user_id' => session('user_id')])->select('penyewaan_id')->findAll()),
        ];
        return view('admin/pages/kosong', $data);
    }
}
