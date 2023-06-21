<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\FasilitasUmumModel;

class FasilitasUmum extends BaseController
{
    protected $FasilitasUmumModel;

    public function __construct() {
        $this->FasilitasUmumModel = new FasilitasUmumModel();
    }

    public function fasilitasUmumRender()
    {
        $data = [
            'fasilitasumums' => $this->FasilitasUmumModel->joinFasilitasUmumStatusForAll()
        ];
        return view('pages/fasilitasumum/v_fasilitasumum',$data);
    }
}
