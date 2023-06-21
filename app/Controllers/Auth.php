<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function loginRender()
    {
        $data = [
            'isi' => 'ads'
        ];
        return view('auth/v_login', $data);
    }

    public function login()
    {
        $dataFromRequest = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];

        $dataFromDb = $this->UserModel->where(['email' => $dataFromRequest['email']])->first();

        if ($dataFromDb) {
            $encrypter = \Config\Services::encrypter();
            if ($encrypter->decrypt(hex2bin($dataFromDb['password'])) == $dataFromRequest['password']) {
                $dataForSession = [
                    'user_id' => $dataFromDb['user_id'],
                    'username' => $dataFromDb['username'],
                    'role' => $dataFromDb['role_id'],
                    'IsLoggedIn' => true,
                ];
                
                session()->set($dataForSession);
                return redirect()->to('home');
            } else {
                return redirect()->back()->with('password', 'Password Tidak Ditemukan')->withInput();
            };
        }

        return redirect()->back()->with('email', 'Email Tidak Ditemukan')->withInput();
    }

    public function registerRender()
    {
        $data = [
            'isi' => 'ads'
        ];
        return view('auth/v_register', $data);
    }

    public function register()
    {
        $valid = $this->validate([
            'username' => [
                'rules' => "required|is_unique[user.username]",
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'is_unique' => '{field} Sudah Digunakan',
                ]
            ],
            'email' => [
                'rules' => "required|is_unique[user.email]|valid_email",
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'is_unique' => '{field} Sudah Digunakan',
                    'valid_email' => '{field} Tidak Valid',
                ]
            ],
            'password' => [
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


        $fromRequest = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];
        $encrypter = \Config\Services::encrypter();
        $fromRequest['password'] = bin2hex($encrypter->encrypt($fromRequest['password']));


        $this->UserModel->insert($fromRequest);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
