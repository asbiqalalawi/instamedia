<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('login')) {
            return redirect()->to('/home');
        }

        $data = ['validation' => \Config\Services::validation()];

        return view('users/Login', $data);
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $this->UserModel->where('email', $email)->first();

        if (!$this->validate([
            'password' => [
                'rules' => 'min_length[6]',
                'errors' => 'Password harus lebih dari 6 karakter.'
            ]
        ])) {
            return redirect()->to('/auth')->withInput();
        }

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'image' => $user['image'],
                    'login' => TRUE
                ];
                session()->set($data);
                return redirect()->to('/home');
            } else {
                session()->setFlashData('message', '<div class="alert alert-danger" role="alert">Password yang Anda masukkan salah!</div>');
                return redirect()->to('/auth');
            }
        } else {
            session()->setFlashData('message', '<div class="alert alert-danger" role="alert">Email Anda belum terdaftar.</div>');
            return redirect()->to('/auth');
        }
    }

    public function register()
    {
        if (session()->get('login')) {
            return redirect()->to('/home');
        }

        $data = ['validation' => \Config\Services::validation()];

        return view('users/Register', $data);
    }

    public function regis()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'is_unique[user.email]',
                'errors' => 'Email sudah terdaftar.'

            ],
            'password' => [
                'rules' => 'min_length[6]',
                'errors' => 'Password harus lebih dari 6 karakter.'

            ],
        ])) {
            return redirect()->to('/auth/register')->withInput();
        }

        $this->UserModel->save([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'image' => 'profile.png',
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashData('message', '<div class="alert alert-success" role="alert">Berhasil membuat akun.</div>');

        return redirect()->to('/auth');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
