<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TiketModel;
use App\Models\JeniswisataModel;
use App\Models\JenisWisataTiketBridgeModel;

class Tiket extends BaseController
{

    protected $TiketModel,
              $JenisWisataTiketBridgeModel,
              $JenisWisataModel;

    public function __construct()
    {
        $this->TiketModel = new TiketModel();
        $this->JenisWisataTiketBridgeModel = new JenisWisataTiketBridgeModel();
        $this->JenisWisataModel = new JenisWisataModel();
    }
    public function tiketRender()
    {
        $data = [
            'Tikets' => $this->TiketModel->findAll(),
            'TiketJenisWisataBridges' => $this->JenisWisataTiketBridgeModel->joinJenisWisataTiket(),
            'JenisWisatas' => $this->JenisWisataModel->JenisWisataSelect('jeniswisata_id,wisata_nama')
        ];
        return view('admin/pages/tiket/admin_tiket', $data);
    }


    public function addTiket()
    {
        $data = [
            'tiket_nama' => htmlspecialchars($this->request->getVar('tiket_nama')),
            'tiket_harga' => htmlspecialchars($this->request->getVar('tiket_harga')),
            'tiket_promo' => htmlspecialchars($this->request->getVar('tiket_promo')),
            'penyewaan_id' => htmlspecialchars($this->request->getVar('penyewaan_id')),
            'user_id' => htmlspecialchars(session('user_id')),
        ];

        $validasiModel =  $this->TiketModel->save($data);

        $error = [
            'validasi' => $this->TiketModel->errors(),
            'error' => 'Data Gagal Disimpan'
        ];
        if (!$validasiModel) {
            return redirect()->back()->with('errors', $error)->withInput();
        }

        return redirect()->to(site_url('admin/tiket'))->with('success', 'Data Berhasil Di Simpan');
    }

    public function editTiket($id)
    {
        $data = [
            'tiket_nama' => htmlspecialchars($this->request->getVar('tiket_nama')),
            'tiket_harga' => htmlspecialchars($this->request->getVar('tiket_harga')),
            'tiket_promo' => htmlspecialchars($this->request->getVar('tiket_promo')),
            'penyewaan_id' => htmlspecialchars($this->request->getVar('penyewaan_id')),
            'user_id' => htmlspecialchars(session('user_id')),
        ];


        $this->TiketModel->update($id, $data);
        return redirect()->to(site_url('admin/tiket'))->with('success', 'Data Berhasil Di Edit');
    }

    public function deleteTiket($id)
    {
        $this->JenisWisataTiketBridgeModel->where('tiket_id', $id)->delete();
        $this->TiketModel->delete($id);
        return redirect()->to(site_url('admin/tiket'))->with('success', 'Data Berhasil Di Hapus');
    }
}
