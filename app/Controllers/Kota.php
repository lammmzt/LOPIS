<?php 
namespace App\Controllers;

use App\Models\kotaModel;


class Kota extends BaseController{

    protected $kotaModel;
    
    public function __construct()
    {
        $this->kotaModel = new kotaModel();
    }

    public function index(){
        $data = [
            'title' => 'Kota - LOPIS',
            'menu' => 'Kota',
            'sub_menu' => 'Dashboard',
            'kota' => $this->kotaModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        
        return view('Admin/Kota/index', $data);
    }

    public function Save(){
        $nama_kota = $this->request->getPost('name');
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[kota.nama_kota]',
                'errors' => [
                    'required' => 'Nama kota harus diisi',
                    'is_unique' => 'Nama kota sudah terdaftar'
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'Nama kota sudah ada');
            return redirect()->to('/Kota')->withInput();
        }
        $this->kotaModel->save([
            'nama_kota' => $nama_kota,
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/Kota');
    }

    public function Update(){
        $nama_kota = $this->request->getPost('name');
        $id_kota = $this->request->getPost('id_kota');
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kota harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'Nama kota sudah ada');
            return redirect()->to('/Kota')->withInput();
        }
        $this->kotaModel->save([
            'nama_kota' => $nama_kota,
            'id_kota' => $id_kota,
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/Kota');
    }
}


?>