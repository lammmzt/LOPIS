<?php

namespace App\Controllers;

use App\Models\kelurahanModel;
use App\Models\kecamatanModel;
use App\Models\kotaModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\HTTP\ResponseInterface;



class Kelurahan extends BaseController
{

    protected $kelurahanModel;
    protected $kecamatanModel;

    public function __construct()
    {
        $this->kelurahanModel = new kelurahanModel();
        $this->kecamatanModel = new kecamatanModel();
    }

    public function index()
    {
        $kotaModel = new kotaModel();
        $data = [
            'title' => 'kelurahan - LOPIS',
            'menu' => 'kelurahan',
            'sub_menu' => 'Dashboard',
            'kelurahan' => $this->kelurahanModel->getKelurahan(),
            'kecamatan' => $this->kecamatanModel->findAll(),
            'kota' => $kotaModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('Admin/Kelurahan/index', $data);
    }


    public function fetch_kel($id = false)
    {
        if ($id == false) {
            $data_kel = $this->kelurahanModel->getKelurahan();
        } else {
            $data_kel = $this->kelurahanModel->getKelurahan($id);
        }

        return $this->response->setJSON([
            'error' => false,
            'data' => $data_kel,
            'status' => '200'
        ]);
    }

    public function Save()
    {
        $nama_kelurahan = $this->request->getPost('name');
        $kecamatan_id = $this->request->getPost('kecamatan_id');
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[kelurahan.nama_kelurahan]',
                'errors' => [
                    'required' => 'Nama kelurahan harus diisi',
                    'is_unique' => 'Nama kelurahan sudah terdaftar'
                ]
            ],
            'kecamatan_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kelurahan harus diisi',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/Kelurahan')->withInput();
        }
        $this->kelurahanModel->insert([
            'id_kelurahan' => Uuid::uuid4()->getHex(),
            'nama_kelurahan' => $nama_kelurahan,
            'kecamatan_id' => $kecamatan_id,
            'created_at' => date('Y-m-d'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/Kelurahan');
    }

    public function Update()
    {
        $nama_kelurahan = $this->request->getPost('nama_kelurahan');
        $id_kelurahan = $this->request->getPost('id_kelurahan');
        // dd($id_kecamatan, $id_kelurahan, $nama_kelurahan);

        if (!$this->validate([
            'nama_kelurahan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kelurahan harus diisi',
                ]
            ],
            'kecamatan_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kelurahan harus diisi',
                ]
            ],
        ])) {
            //  get all errors
            $validation = \Config\Services::validation();
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/Kelurahan')->withInput();
        }

        $this->kelurahanModel->update($id_kelurahan, [
            'nama_kelurahan' => $nama_kelurahan,
            'kecamatan_id' => $this->request->getPost('kecamatan_id'),
            'updated_at' => date('Y-m-d'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/Kelurahan');
    }

    public function Delete()
    {
        $this->kelurahanModel->delete($this->request->getPost('id_kelurahan'));
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/Kelurahan');
    }
}