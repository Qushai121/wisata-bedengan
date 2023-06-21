<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JeniswisataModel;
use App\Models\JenisWisataTiketBridgeModel;
use App\Models\StatusModel;

class JenisWisata extends BaseController
{
    protected $ModelJenisWisata,
              $ModelStatus,
              $JenisWisataTiketBridgeModel;

    public function __construct()
    {
        $this->ModelJenisWisata = new JeniswisataModel();
        $this->ModelStatus = new StatusModel();
        $this->JenisWisataTiketBridgeModel = new JenisWisataTiketBridgeModel();
    }
    
    public function jenisWisataRender()
    {
        $data = [
            'JenisWisatas' => $this->ModelJenisWisata->joinJenisWisataStatus(),
            'Statuss' => $this->ModelStatus->findAll(),
            'jenisWisataTiketBridges' => $this->JenisWisataTiketBridgeModel->joinJenisWisataTiket()
        ];
        return view('admin/pages/jeniswisata/admin_jenisWisata', $data);
    }

    public function addJenisWisata()
    {
        $data = [
            'wisata_nama' => htmlspecialchars($this->request->getVar('wisata_nama')),
            'wisata_thumbnail' => htmlspecialchars($this->request->getVar('wisata_thumbnail')),
            'wisata_description' => htmlspecialchars($this->request->getVar('wisata_description')),
            'wisata_detail' => htmlspecialchars($this->request->getVar('wisata_detail')),
            'wisata_status' => htmlspecialchars($this->request->getVar('wisata_status')),
            'user_id' => htmlspecialchars(session('user_id')),
        ];



        $fileSampul = $this->request->getFile('wisata_thumbnail');
        // apakah tidak ada gambar yang di uploaded
        if ($fileSampul->getError() == 4) {
            $data['wisata_thumbnail'] = 'default.jpg';
        } else {
            // generate nama sampul
            $data['wisata_thumbnail'] = $fileSampul->getRandomName();
        }

        $validasiModel =  $this->ModelJenisWisata->save($data);
        
        $error = [
            'validasi' => $this->ModelJenisWisata->errors(),
            'error' => 'Data Gagal Disimpan'
        ];
        if (!$validasiModel) {
            return redirect()->back()->withInput()->with('errors', $error);
        }
        // pindahkan file ke folder public/img
        if ($fileSampul->getError() != 4) {

            $fileSampul->move('img/upload', $data['wisata_thumbnail']);
        }
        return redirect()->to(site_url('admin/jenis-wisata'))->with('success', 'Data Berhasil Di Simpan');
    }

    public function editJenisWisata(int $id)
    {

        $fileSampul = $this->request->getFile('wisata_thumbnail');
        // cek gambar
        if ($fileSampul->getError() == 4) {
            $fileAkhir = $this->request->getVar('wisata_thumbnail_lama');
        } else {
            $fileAkhir = $fileSampul->getRandomName();

            if ($this->request->getVar('wisata_thumbnail_lama') != 'default.jpg' && file_exists(base_url("/img/upload/{$fileAkhir}")) ) {
                unlink('img/upload/' . $this->request->getVar('wisata_thumbnail_lama'));
            }
        }
        
        $data = [
            'wisata_nama' => htmlspecialchars($this->request->getVar('wisata_nama')),
            'wisata_thumbnail' => $fileAkhir,
            'wisata_description' => htmlspecialchars($this->request->getVar('wisata_description')),
            'wisata_detail' => htmlspecialchars($this->request->getVar('wisata_detail')),
            'wisata_status' => htmlspecialchars($this->request->getVar('wisata_status')),
            'user_id' => htmlspecialchars(session('user_id')),
        ];

        $validasiModel = $this->ModelJenisWisata->where('user_id', session('user_id'))->update($id, $data);

        $error = [
            'validasi' => $this->ModelJenisWisata->errors(),
            'error' => 'Data Gagal Disimpan'
        ];
        if (!$validasiModel) {
            return redirect()->back()->withInput()->with('errors', $error);
        }

        if ($fileSampul->getError() != 4) {
            $fileSampul->move('img/upload', $data["wisata_thumbnail"]);
        }

        return redirect()->to(site_url('admin/jenis-wisata'))->with('success', 'Data Berhasil Di Edit');
    }

    public function deleteJenisWisata(int $id)
    {
        $dataFromDb =  $this->ModelJenisWisata->where(['jeniswisata_id' => $id])->first();
        if ($dataFromDb['wisata_thumbnail'] != 'default.jpg' || file_exists(base_url("/img/upload/{$dataFromDb['wisata_thumbnail']}")) ) {
            unlink('img/upload/' . $dataFromDb['wisata_thumbnail']);
        }
        $this->ModelJenisWisata->where('user_id', session('user_id'))->delete($id);
        return redirect()->to(site_url('admin/jenis-wisata'))->with('success', 'Data Berhasil Di Hapus');
    }
}
