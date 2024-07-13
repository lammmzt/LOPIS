<?php 
namespace App\Controllers;

use App\Models\usersModel;


class Users extends BaseController{

    protected $usersModel;
    
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index(){
        $data = [
            'title' => 'users - LOPIS',
            'menu' => 'users',
            'sub_menu' => 'Dashboard',
            'users' => $this->usersModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        
        return view('Admin/users/index', $data);
    }

    public function Save(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password harus diisi',
                    
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'role harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'Nama users sudah ada');
            return redirect()->to('/users')->withInput();
        }
        $this->usersModel->save([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role,
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/Users');
    }

    public function Update(){
        $username = $this->request->getPost('username');
        $id_user = $this->request->getPost('id_user');
        $role = $this->request->getPost('role');
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi',
                
                ]
            ], 
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'role harus diisi',
                ]
            ],
        ]))  {
            session()->setFlashdata('error', 'Nama users sudah ada');
            return redirect()->to('/users')->withInput();
        }
        $this->usersModel->save([
            'username' => $username,
            'id_user' => $id_user,
            'role' => $role,
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/Users');
    }

    public function Delete(){
        $this->usersModel->delete($this->request->getPost('id_user'));
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/Users');
    }
}


?>