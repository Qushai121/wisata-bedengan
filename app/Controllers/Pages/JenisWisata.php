<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\JeniswisataModel;
use App\Models\JenisWisataTiketBridgeModel;
use App\Models\WisataSectionModel;

class JenisWisata extends BaseController
{

    private $JeniswisataModel,
    $JenisWisataTiketBridgeModel,
    $WisataSectionModel;

    public function __construct()
    {
        $this->JeniswisataModel = new JeniswisataModel();
        $this->JenisWisataTiketBridgeModel = new JenisWisataTiketBridgeModel();
        $this->WisataSectionModel = new WisataSectionModel();
    }

    public function jenisWisataRender()
    {
        $data = [
            'jenisWisatas' => $this->JeniswisataModel->getJenisWisataForCard(),
            'jenisWisataBridges' => $this->JenisWisataTiketBridgeModel->joinJenisWisataForCard()
        ];

        return view('pages/jeniswisata/v_jeniswisata', $data);
    }

    public function jenisWisataDetailRender($id)
    {
        $data = [
            'jenisWisatas' => $this->JeniswisataModel->getJenisWisataForCardDetail($id),
            'jenisWisataDetail' => $this->JeniswisataModel->getJenisWisataForDetail($id),
            'jenisWisataDetailTikets' => $this->JenisWisataTiketBridgeModel->joinJenisWisataForDetailById($id),
            'wisataSections' => $this->WisataSectionModel->getWisataById($id),
        ];

    
        return view('pages/jeniswisata/v_jeniswisatadetail', $data);
    }
}
