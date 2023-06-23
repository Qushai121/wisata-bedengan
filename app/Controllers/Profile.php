<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{

    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'dataUser' => $this->UserModel->where(['user_id' => session('user_id')])->first()
        ];
        return view('admin/pages/profile/index', $data);
    }
    public function editProfile()
    {

        $fileSampul = $this->request->getFile('foto');
        // cek gambar
        if ($fileSampul->getError() == 4) {
            $fileAkhir = $this->request->getVar('foto_lama');
        } else {
            $fileAkhir = $fileSampul->getRandomName();

            if ($this->request->getVar('foto_lama') != 'default.jpg' && file_exists(base_url("/img/upload/{$fileAkhir}"))) {
                unlink('img/upload/' . $this->request->getVar('foto_lama'));
            }
        }

        $data = [
            'username' => htmlspecialchars($this->request->getVar('username')),
            'foto' => $fileAkhir,
        ];

        $validasiModel = $this->UserModel->where('user_id', session('user_id'))->update(session('user_id'), $data);

        $error = [
            'validasi' => $this->UserModel->errors(),
            'error' => 'Data Gagal Disimpan'
        ];
        if (!$validasiModel) {
            return redirect()->back()->withInput()->with('errors', $error);
        }

        if ($fileSampul->getError() != 4) {
            $fileSampul->move('img/upload', $data["foto"]);
        }

        return redirect()->back()->with('success', 'Data Berhasil Di Edit');
        dd($this->request->getPost());
    }

    public function changePass()
    {
        $encrypter = \Config\Services::encrypter();

        $dataFromRequest = [
            'password_lama' => htmlspecialchars($this->request->getVar('password_lama')),
            'confirm_pass' => htmlspecialchars($this->request->getVar('confirm_pass')),
            'confirm_passdua' => htmlspecialchars($this->request->getVar('confirm_passdua')),
        ];

        $valid = $this->validate([
            'confirm_pass' => [
                'rules' => "required|min_length[3]",
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'min_length' => '{field} anda terlalu pendek',
                ]
            ],
            'confirm_passdua' => [
                'rules' => "required|min_length[3]",
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'min_length' => '{field} anda terlalu pendek',
                ]
            ],
        ]);

        if (!$valid) {
            return redirect()->back()->withInput();
        }

        if ($dataFromRequest['confirm_pass'] != $dataFromRequest['confirm_passdua']) {
            return redirect()->back()->with('errors', 'Password Baru Dan Confirm Password Harus Sama');
        }

        $dataFromDb = $this->UserModel->where(['user_id' => session('user_id')])->first();

        if ($encrypter->decrypt(hex2bin($dataFromDb['password'])) == $dataFromRequest['password_lama']) {
            $passBaru = [
                'password' => bin2hex($encrypter->encrypt($dataFromRequest['confirm_pass'])),

            ];

           
            $this->UserModel->where('user_id', session('user_id'))->update(session('user_id'), $passBaru);
            return redirect()->back()->with('success', 'Data Berhasil Di Edit');
        } else {

            return redirect()->back()->with('errors', 'Masukan Password lama anda');
        }
    }
}
