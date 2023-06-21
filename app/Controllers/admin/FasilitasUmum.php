<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FasilitasUmumModel;
use App\Models\StatusModel;

class FasilitasUmum extends BaseController
{
    protected $Modelfasilitasumum,
        $ModelStatus;

    public function __construct()
    {
        $this->Modelfasilitasumum = new FasilitasUmumModel();
        $this->ModelStatus = new StatusModel();
    }
    public function FasilitasUmumRender()
    {
        $data = [
            'Fasilitasumums' => $this->Modelfasilitasumum->FasilitasUmumJoinStatus(),
            'Statuss' => $this->ModelStatus->findAll(),
        ];

        // dd($data['Fasilitasumums']);
        return view('admin/pages/fasilitasumum/admin_FasilitasUmum', $data);
    }


    public function addFasilitasUmum()
    {
        $data = [
            'fasilitasumum_nama' => htmlspecialchars($this->request->getVar('fasilitasumum_nama')),
            'fasilitasumum_detail' => htmlspecialchars($this->request->getVar('fasilitasumum_detail')),
            'fasilitasumum_lokasi' => htmlspecialchars($this->request->getVar('fasilitasumum_lokasi')),
            'fasilitasumum_status' => htmlspecialchars($this->request->getVar('fasilitasumum_status')),
            'fasilitasumum_gambar' => htmlspecialchars($this->request->getVar('fasilitasumum_gambar')),
            'user_id' => session('user_id'),
        ];

        $fileSampul = $this->request->getFile('fasilitasumum_gambar');
        // apakah tidak ada gambar yang di uploaded
        if ($fileSampul->getError() == 4) {
            $data['fasilitasumum_gambar'] = 'default.jpg';
        } else {
            // generate nama sampul
            $data['fasilitasumum_gambar'] = $fileSampul->getRandomName();
        }

        $validasiModel =  $this->Modelfasilitasumum->save($data);

        $error = [
            'validasi' => $this->Modelfasilitasumum->errors(),
            'error' => 'Data Gagal Disimpan'
        ];
        if (!$validasiModel) {
            return redirect()->back()->with('errors', $error)->withInput();
        }
        // pindahkan file ke folder public/img
        if ($fileSampul->getError() != 4) {

            $fileSampul->move('img/upload', $data['fasilitasumum_gambar']);
        }

        return redirect()->to(site_url('admin/fasilitas-umum'))->with('success', 'Data Berhasil Di Simpan');
    }


    public function editFasilitasUmum($id)
    {
        $fileSampul = $this->request->getFile('fasilitasumum_gambar');
        // cek gambar
        if ($fileSampul->getError() == 4) {
            $fileAkhir = $this->request->getVar('fasilitasumum_gambar_lama');
        } else {
            $fileAkhir = $fileSampul->getRandomName();

            if ($this->request->getVar('fasilitasumum_gambar_lama') != 'default.jpg' && file_exists(base_url("/img/upload/{$fileAkhir}"))) {
                unlink('img/upload/' . $this->request->getVar('fasilitasumum_gambar_lama'));
            }
        }

        $data = [
            'fasilitasumum_nama' => htmlspecialchars($this->request->getVar('fasilitasumum_nama')),
            'fasilitasumum_detail' => htmlspecialchars($this->request->getVar('fasilitasumum_detail')),
            'fasilitasumum_lokasi' => htmlspecialchars($this->request->getVar('fasilitasumum_lokasi')),
            'fasilitasumum_status' => htmlspecialchars($this->request->getVar('fasilitasumum_status')),
            'fasilitasumum_gambar' => $fileAkhir,
            'user_id' => session('user_id'),
        ];

        $this->Modelfasilitasumum->where('user_id', session('user_id'))->update($id, $data);

        if ($fileSampul->getError() != 4) {
            $fileSampul->move('img/upload', $data["fasilitasumum_gambar"]);
        }

        return redirect()->to(site_url('admin/fasilitas-umum'))->with('success', 'Data Berhasil Di Edit');
    }

    public function deleteFasilitasUmum($id)
    {
        $dataFromDb =  $this->Modelfasilitasumum->where('fasilitasumum_id', $id)->first();
        if ($dataFromDb['fasilitasumum_gambar'] != 'default.jpg' && file_exists(base_url("/img/upload/{$dataFromDb['fasilitasumum_gambar']}"))) {
            unlink('img/upload/' . $dataFromDb['fasilitasumum_gambar']);
        }
        $this->Modelfasilitasumum->where('user_id', session('user_id'))->delete($id);
        return redirect()->to(site_url('admin/fasilitas-umum'))->with('success', 'Data Berhasil Di Hapus');
    }
}
