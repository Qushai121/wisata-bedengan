<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PenyewaanModel;
use App\Models\PenyewaanTiketBridgeModel;
use App\Models\StatusModel;

class Penyewaan extends BaseController
{
    protected $ModelPenyewaan,
              $ModelStatus;
    // protected $PenyewaanTiketBridgeModel;

    public function __construct()
    {
        $this->ModelPenyewaan = new PenyewaanModel();
        $this->ModelStatus = new StatusModel();
        
    }
    
    public function PenyewaanRender()
    {
        $data = [
            'Penyewaans' => $this->ModelPenyewaan->joinPenyewaanStatus(),
            'Statuss' => $this->ModelStatus->findAll(),
        ];
        // dd($data);
        return view('admin/pages/Penyewaan/admin_Penyewaan', $data);
    }

    public function addPenyewaan()
    {
        $data = [
            'penyewaan_nama' => htmlspecialchars($this->request->getVar('penyewaan_nama')),
            'penyewaan_detail' => htmlspecialchars($this->request->getVar('penyewaan_detail')),
            'penyewaan_lokasi' => htmlspecialchars($this->request->getVar('penyewaan_lokasi')),
            'penyewaan_status' => htmlspecialchars($this->request->getVar('penyewaan_status')),
            'penyewaan_gambar' => htmlspecialchars($this->request->getVar('penyewaan_gambar')),
            'penyewaan_harga' => htmlspecialchars($this->request->getVar('penyewaan_harga')),
            'user_id' => session('user_id'),
        ];

        $fileSampul = $this->request->getFile('penyewaan_gambar');
        // apakah tidak ada gambar yang di uploaded
        if ($fileSampul->getError() == 4) {
            $data['penyewaan_gambar'] = 'default.jpg';
        } else {
            // generate nama sampul
            $data['penyewaan_gambar'] = $fileSampul->getRandomName();
        }

        $validasiModel =  $this->ModelPenyewaan->save($data);
        $error = [
            'validasi' => $this->ModelPenyewaan->errors(),
            'error' => 'Data Gagal Disimpan'
        ];
        if (!$validasiModel) {
            return redirect()->back()->with('errors', $error)->withInput();
        }
        // pindahkan file ke folder public/img
        if ($fileSampul->getError() != 4) {

            $fileSampul->move('img/upload', $data['penyewaan_gambar']);
        }

        return redirect()->to(site_url('admin/fasilitas-penyewaan'))->with('success', 'Data Berhasil Di Simpan');
    }

    public function editPenyewaan($id)
    {
        $fileSampul = $this->request->getFile('penyewaan_gambar');
        // cek gambar
        if ($fileSampul->getError() == 4) {
            $fileAkhir = $this->request->getVar('penyewaan_gambar_lama');
        } else {
            $fileAkhir = $fileSampul->getRandomName();

            if ($this->request->getVar('penyewaan_gambar_lama') != 'default.jpg' && file_exists(base_url("/img/upload/{$fileAkhir}"))  ) {
                unlink('img/upload/' . $this->request->getVar('penyewaan_gambar_lama'));
            }
        }

        $data = [
            'penyewaan_nama' => htmlspecialchars($this->request->getVar('penyewaan_nama')),
            'penyewaan_detail' => htmlspecialchars($this->request->getVar('penyewaan_detail')),
            'penyewaan_lokasi' => htmlspecialchars($this->request->getVar('penyewaan_lokasi')),
            'penyewaan_status' => htmlspecialchars($this->request->getVar('penyewaan_status')),
            'penyewaan_gambar' => $fileAkhir,
            'penyewaan_harga' => htmlspecialchars($this->request->getVar('penyewaan_harga')),
            'user_id' => session('user_id'),
        ];

        $this->ModelPenyewaan->where('user_id', session('user_id'))->update($id, $data);

        if ($fileSampul->getError() != 4) {
            $fileSampul->move('img/upload', $data["penyewaan_gambar"]);
        }

        return redirect()->to(site_url('admin/fasilitas-penyewaan'))->with('success', 'Data Berhasil Di Edit');
    }

    public function deletePenyewaan($id)
    {
        $dataFromDb =  $this->ModelPenyewaan->where('penyewaan_id', $id)->first();
        if ($dataFromDb['penyewaan_gambar'] != 'default.jpg' && file_exists(base_url("/img/upload/{$dataFromDb['penyewaan_gambar']}")) ) {
            unlink('img/upload/' . $dataFromDb['penyewaan_gambar']);
        }
        $this->ModelPenyewaan->where('user_id', session('user_id'))->delete($id);
        return redirect()->to(site_url('admin/fasilitas-penyewaan'))->with('success', 'Data Berhasil Di Hapus');
    }
}
