<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ForgetPassword extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function indexRender()
    {
        return view('auth/forgetPass');
    }

    public function sendEmail()
    {
        $emailVerif = $this->request->getPost('email');

        $dataFromDb = $this->UserModel->where(['email' => $emailVerif])->findAll();

        if (!empty($dataFromDb[0])) {

            $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pieces = [];
            $max = mb_strlen($stringSpace, '8bit') - 1;
            for ($i = 0; $i < 10; ++$i) {
                $pieces[] = $stringSpace[random_int(0, $max)];
            }
            $token =  implode('', $pieces);
            

            $this->UserModel->where(["user_id" => $dataFromDb[0]['user_id']])->update($dataFromDb[0]['user_id'], array('token' => $token));

            $emailService = service('email');
            $emailService->setTo($emailVerif);
            $emailService->setFrom('binomodelesol@gmail.com', 'Wisata Bedengan');

            $emailService->setSubject('udin udut');
            $emailService->setMessage("
                    Token Anda
                    $token 
                    ");

            if ($emailService->send()) {
                return view('auth/v_verifikasiToken', ['email' => $dataFromDb[0]['email']]);
            } else {

                echo "email gagal terkirim";
            }
        } else {
            echo 'email anda tidak terdaftar';
        }
    }

    public function verifikasiToken()
    {
        $emailVerif = $this->request->getPost('email');
        $token = $this->request->getPost('token');

        $dataFromDb = $this->UserModel->where(['email' => $emailVerif, 'token' => $token])->first();

        if (!empty($dataFromDb)) {
            $encrypter = \Config\Services::encrypter();
            $password =  $encrypter->decrypt(hex2bin($dataFromDb['password']));
            return view('auth/showPass', ['password' => $password]);
        } else {
            echo 'gagal';
        }
    }

    
}
