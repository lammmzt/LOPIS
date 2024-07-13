<?php 
namespace App\Controllers;

use App\Models\rtModel;
use App\Models\rwModel;


class rt extends BaseController{

    protected $rtModel;
    protected $rwModel;
    
    public function __construct()
    {
        $this->rtModel = new rtModel();
        $this->rwModel = new rwModel();
    }

    public function index(){
        $data = [
            'title' => 'rt - LOPIS',
            'menu' => 'rt',
            'sub_menu' => 'Dashboard',
            'rt' => $this->rtModel->getrt(),
            'rw' => $this->rwModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        
        // dd($data);
        return view('Admin/rt/index', $data);
    }

    public function Save(){
        $nama_rt = $this->request->getPost('name');
        $rw_id = $this->request->getPost('rw_id');
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[rt.nama_rt]',
                'errors' => [
                    'required' => 'No rt harus diisi',
                    'is_unique' => 'No rt sudah terdaftar'
                ]
            ],
            'rw_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama rw harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'No rw sudah ada');
            return redirect()->to('/rt')->withInput();
        }
        $this->rtModel->save([
            'nama_rt' => $nama_rt,
            'rw_id' => $rw_id,
            'created_at' => date('Y-m-d'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/rt');
    }

    public function Update(){
        $nama_rt = $this->request->getPost('name');
        $id_rt = $this->request->getPost('id_rt');
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No rt harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'no rt sudah ada');
            return redirect()->to('/rt')->withInput();
        }
        $this->rtModel->save([
            'nama_rt' => $nama_rt,
            'id_rt' => $id_rt,
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/rt');
    }

    public function Delete(){
        $this->rtModel->delete($this->request->getPost('id_rt'));
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/rt');
    }
}


?>