<?php 
namespace App\Controllers;

use App\Models\usersModel;
use App\Models\detailUsersModel;
use App\Models\kelurahanModel;
class Users extends BaseController{

    protected $usersModel;
    protected $detailUsersModel;
    protected $kelurahanModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->detailUsersModel = new detailUsersModel();
        $this->kelurahanModel = new kelurahanModel();

    }

    public function index(){
        $data = [
            'title' => 'users - LOPIS',
            'menu' => 'users',
            'sub_menu' => 'Dashboard',
            'users' => $this->usersModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        
        return view('Admin/Users/index', $data);
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


    // Detail User
    public function Detail(){
        $data=[
            'title' => 'Detail User - LOPIS',
            'menu' => 'Detail User',
            'sub_menu' => 'User',
            'detail_user' => $this->detailUsersModel->getDetailUsers(),
            'users' => $this->usersModel->findAll(),
            'kelurahan' => $this->kelurahanModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('Admin/Users/detail', $data);
        
    }
    public function save_detail_user(){
        $user_id = $this->request->getPost('user_id');
        $nama_user = $this->request->getPost('nama_user');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $alamat_user = $this->request->getPost('alamat_user');
        $kelurahan_id = $this->request->getPost('kelurahan_id');
        if (!$this->validate([
            'user_id' => [
                'rules' => 'required|is_unique[detail_user.user_id]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            
            ],
        ])) {
            session()->setFlashdata('error', 'Nama users sudah ada');
            return redirect()->to('/Users/detail')->withInput();
        }
        $this->detailUsersModel->save([
            'user_id' => $user_id,
            'nama_user' => $nama_user,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat_user' => $alamat_user,
            'kelurahan_id' => $kelurahan_id,
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/Users/detail');
    }
}


?>