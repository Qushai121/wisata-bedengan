<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JenisWisataTiketBridgeModel;
use App\Models\JeniswisataModel;
use App\Models\TiketModel;

class TiketJenisWisataBridge extends BaseController
{
    protected $JenisWisataTiketBridgeModel,
              $JeniswisataModel,
              $TiketModel;

    public function __construct()
    {
        $this->JenisWisataTiketBridgeModel = new JenisWisataTiketBridgeModel();
        $this->JeniswisataModel = new JeniswisataModel();
        $this->TiketModel = new TiketModel();
    }

    public function index($id, $tipeGet)
    {
        if ($tipeGet == 'tiket' || $tipeGet == 'jeniswisata') {
            $data = [
                'jenisWisataTiketBridges' => $this->JenisWisataTiketBridgeModel->joinjeniswisataTiketById_TipeGet($id, $tipeGet),
                'jenisWisatas' => $this->JeniswisataModel->JenisWisataSelect('jeniswisata_id,wisata_nama'),
                'jenisWisatabyids' => $this->JeniswisataModel->JenisWisataById($id),
                'Tikets' => $this->TiketModel->TiketSelect('tiket_id,tiket_nama,tiket_harga'),
                'Tiketbyids' => $this->TiketModel->TiketById($id),
                'tipeGet' => $tipeGet
            ];
            return view('admin/pages/tiket/TiketJenisWisataBrigde/bridgesjenisWisatadetail', $data);
        }

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    public function addTiketJenisWisataBridge()
    {
        $data = [
            'tiket_id' => htmlspecialchars($this->request->getVar('tiket_id')),
            'jeniswisata_id' => htmlspecialchars($this->request->getVar('jeniswisata_id')),
        ];

        $validasiModel =  $this->JenisWisataTiketBridgeModel->save($data);

        $error = [
            'error' => 'Data Gagal Disimpan'
        ];

        if (!$validasiModel) {
            return redirect()->back()->with('errors', $error)->withInput();
        }

        return redirect()->back()->with('success', 'Data Berhasil Di Simpan');
    }

    public function editTiketJenisWisataBridge($id)
    {
        $data = [
            'tiket_id' => htmlspecialchars($this->request->getVar('tiket_id')),
            'jeniswisata_id' => htmlspecialchars($this->request->getVar('jeniswisata_id')),
        ];


        $this->JenisWisataTiketBridgeModel->update($id, $data);
        return redirect()->back()->with('success', 'Data Berhasil Di Edit');
    }

    public function deleteTiketJenisWisataBridge($id)
    {

        $this->JenisWisataTiketBridgeModel->delete($id);
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus');
    }
}
