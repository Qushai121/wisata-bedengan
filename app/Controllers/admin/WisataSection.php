<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JeniswisataModel;
use App\Models\WisataSectionModel;

class WisataSection extends BaseController
{
    protected $JeniswisataModel,
    $WisataSectionModel
    ;
    public function __construct() {
        $this->JeniswisataModel = new JeniswisataModel();
        $this->WisataSectionModel = new WisataSectionModel();
    }
    public function WisataSectionRender()
    {
        $data = [
            'JenisWisatas' => $this->JeniswisataModel->where(['user_id'=>session('user_id')])->findAll(),
            'WisataSections' => $this->WisataSectionModel->findAll()
        ];
        return view('admin/pages/wisatasection/admin_wisatasection', $data);
    }

    public function addWisataSection()
    {
        $data = [
            'wisatasection_judul' => htmlspecialchars($this->request->getVar('wisatasection_judul')),
            'wisatasection_deskripsi' => htmlspecialchars($this->request->getVar('wisatasection_deskripsi')),
            'wisatasection_detail' => htmlspecialchars($this->request->getVar('wisatasection_detail')),
            'jeniswisata_id' => htmlspecialchars($this->request->getVar('jeniswisata_id')),
            'user_id' => session('user_id'),
        ];

        $fileSampul = $this->request->getFile('wisatasection_gambar');
        // apakah tidak ada gambar yang di uploaded
        if ($fileSampul->getError() == 4) {
            $data['wisatasection_gambar'] = 'default.jpg';
        } else {
            // generate nama sampul
            $data['wisatasection_gambar'] = $fileSampul->getRandomName();
        }
        
        // dd($data);
        $validasiModel =  $this->WisataSectionModel->insert($data);
        $error = [
            'validasi' => $this->WisataSectionModel->errors(),
            'error' => 'Data Gagal Disimpan'
        ];
        if (!$validasiModel) {
            return redirect()->back()->withInput()->with('errors', $error);
        }
        // pindahkan file ke folder public/img
        if ($fileSampul->getError() != 4) {

            $fileSampul->move('img/upload', $data['wisatasection_gambar']);
        }
        return redirect()->to(site_url('admin/wisata-section'))->with('success', 'Data Berhasil Di Simpan');
    }

    public function editWisataSection(int $id)
    {

        $fileSampul = $this->request->getFile('wisatasection_gambar');
        // cek gambar
        if ($fileSampul->getError() == 4) {
            $fileAkhir = $this->request->getVar('wisatasection_gambar_lama');
        } else {
            $fileAkhir = $fileSampul->getRandomName();

            if ($this->request->getVar('wisatasection_gambar_lama') != 'default.jpg' && file_exists(base_url("/img/upload/{$fileAkhir}")) ) {
                unlink('img/upload/' . $this->request->getVar('wisatasection_gambar_lama'));
            }
        }
        
        $data = [
            'wisatasection_judul' => htmlspecialchars($this->request->getVar('wisatasection_judul')),
            'wisatasection_deskripsi' => htmlspecialchars($this->request->getVar('wisatasection_deskripsi')),
            'wisatasection_detail' => htmlspecialchars($this->request->getVar('wisatasection_detail')),
            'jeniswisata_id' => htmlspecialchars($this->request->getVar('jeniswisata_id')),
            'user_id' => session('user_id'),
        ];

        $validasiModel = $this->WisataSectionModel->where(['user_id'=>session('user_id')])->update($id, $data);

        $error = [
            'validasi' => $this->WisataSectionModel->errors(),
            'error' => 'Data Gagal Disimpan'
        ];
        if (!$validasiModel) {
            return redirect()->back()->withInput()->with('errors', $error);
        }

        if ($fileSampul->getError() != 4) {
            $fileSampul->move('img/upload', $data["wisatasection_gambar"]);
        }

        return redirect()->to(site_url('admin/wisata-section'))->with('success', 'Data Berhasil Di Edit');
    }

    public function deleteWisataSection(int $id)
    {
        $dataFromDb =  $this->WisataSectionModel->where(['wisatasection_id' => $id])->first();
        if ($dataFromDb['wisatasection_gambar'] != 'default.jpg' && file_exists(base_url("/img/upload/{$dataFromDb['wisatasection_gambar']}")) ) {
            unlink('img/upload/' . $dataFromDb['wisatasection_gambar']);
        }
        $this->WisataSectionModel->where(['user_id'=>session('user_id')])->delete($id);
        return redirect()->to(site_url('admin/wisata-section'))->with('success', 'Data Berhasil Di Hapus');
    }
}
