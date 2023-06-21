<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StatusModel;

class Status extends BaseController
{
    protected $StatusModel;
    public function __construct() {
        $this->StatusModel = new StatusModel();
    }
    public function statusRender()
    {
        $data = [
            'statuss' => $this->StatusModel->findAll(),
        ];
        return view('admin/pages/status/admin_status', $data);
    }


    public function addStatus()
    {
        $data = [
            'status_detail' => htmlspecialchars($this->request->getVar('status_detail')),
        ];

        $validasiModel =  $this->StatusModel->save($data);

        $error = [
            'validasi' => $this->StatusModel->errors(),
            'error' => 'Data Gagal Disimpan'
        ];
        if (!$validasiModel) {
            return redirect()->back()->with('errors', $error)->withInput();
        }

        return redirect()->to(site_url('admin/status'))->with('success', 'Data Berhasil Di Simpan');
    }

    public function editStatus($id)
    {
        $data = [
            'status_detail' => htmlspecialchars($this->request->getVar('status_detail')),
        ];


        $this->StatusModel->update($id, $data);
        return redirect()->to(site_url('admin/status'))->with('success', 'Data Berhasil Di Edit');
    }

    public function deleteStatus($id)
    {
        $this->StatusModel->delete($id);
        return redirect()->to(site_url('admin/status'))->with('success', 'Data Berhasil Di Hapus');
    }
}
