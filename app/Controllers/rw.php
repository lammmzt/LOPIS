<?php 
namespace App\Controllers;

use App\Models\rwModel;
use App\Models\kelurahanModel;


class rw extends BaseController{

    protected $rwModel;
    protected $kelurahanModel;
    
    public function __construct()
    {
        $this->rwModel = new rwModel();
        $this->kelurahanModel = new kelurahanModel();
    }

    public function index(){
        $data = [
            'title' => 'rw - LOPIS',
            'menu' => 'rw',
            'sub_menu' => 'Dashboard',
            'rw' => $this->rwModel->getrw(),
            'kelurahan' => $this->kelurahanModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        
        // dd($data);
        return view('Admin/rw/index', $data);
    }

    public function Save(){
        $nama_rw = $this->request->getPost('name');
        $kelurahan_id = $this->request->getPost('kelurahan_id');
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[rw.nama_rw]',
                'errors' => [
                    'required' => 'No rw harus diisi',
                    'is_unique' => 'No rw sudah terdaftar'
                ]
            ],
            'kelurahan_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kelurahan harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'No rw sudah ada');
            return redirect()->to('/rw')->withInput();
        }
        $this->rwModel->save([
            'nama_rw' => $nama_rw,
            'kelurahan_id' => $kelurahan_id,
            'created_at' => date('Y-m-d'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/rw');
    }

    public function Update(){
        $nama_rw = $this->request->getPost('name');
        $id_rw = $this->request->getPost('id_rw');
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No rw harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'no rw sudah ada');
            return redirect()->to('/rw')->withInput();
        }
        $this->rwModel->save([
            'nama_rw' => $nama_rw,
            'id_rw' => $id_rw,
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/rw');
    }

    public function Delete(){
        $this->rwModel->delete($this->request->getPost('id_rw'));
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/rw');
    }
}


?>