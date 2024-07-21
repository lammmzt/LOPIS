<?php

namespace App\Controllers;

use App\Models\usersModel;
use App\Models\detailUsersModel;
use App\Models\kelurahanModel;

class Auth extends BaseController
{

    protected $usersModel;
    protected $detailUsersModel;
    protected $kelurahanModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->detailUsersModel = new detailUsersModel();
        $this->kelurahanModel = new kelurahanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation(),
        ];

        return view('Auth/index', $data);
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $this->usersModel->where('username', $username)->first();

        if ($data) {
            if (password_verify($password, $data['password'])) {
                session()->set('username', $data['username']);
                session()->set('role', $data['role']);
                session()->set('id_user', $data['id_user']);
                return $this->response->setJSON([
                    'error' => false,
                    'message' => 'Login berhasil',
                    'status' => '200'
                ]);
            } else {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => 'Password salah',
                    'status' => '404'
                ]);
            }
        } else {
            return $this->response->setJSON([
                'error' => true,
                'message' => 'Username tidak ditemukan',
                'status' => '404'
            ]);
        }
    }
}