<?php

namespace App\Controllers;

use App\Models\kecamatanModel;
use App\Models\kotaModel;


class Kecamatan extends BaseController
{

    protected $kecamatanModel;
    protected $kotaModel;

    public function __construct()
    {
        $this->kecamatanModel = new kecamatanModel();
        $this->kotaModel = new kotaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kecamatan - LOPIS',
            'menu' => 'kecamatan',
            'sub_menu' => 'Dashboard',
            'kecamatan' => $this->kecamatanModel->getKecamatan(),
            'kota' => $this->kotaModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        // dd($data);
        return view('Admin/kecamatan/index', $data);
    }

    public function fetch_all($id = false)
    {
        if ($id == false) {
            $data_kecamatan = $this->kecamatanModel->findAll();
        } else {
            $data_kecamatan = $this->kecamatanModel->where('id_kecamatan', $id)->first();
        }

        return $this->response->setJSON([
            'error' => false,
            'data' => $data_kecamatan,
            'status' => '200'
        ]);
    }


    public function fetch_by_kota()
    {
        $kota_id = $this->request->getPost('kota_id');
        $data_kecamatan = $this->kecamatanModel->where('kota_id', $kota_id)->findAll();

        return $this->response->setJSON([
            'error' => false,
            'data' => $data_kecamatan,
            'status' => '200'
        ]);
    }

    public function Save()
    {
        $nama_kecamatan = $this->request->getPost('name');
        $kota_id = $this->request->getPost('kota_id');
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[kecamatan.nama_kecamatan]',
                'errors' => [
                    'required' => 'Nama kecamatan harus diisi',
                    'is_unique' => 'Nama kecamatan sudah terdaftar'
                ]
            ],
            'kota_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kecamatan harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'Nama kecamatan sudah ada');
            return redirect()->to('/kecamatan')->withInput();
        }
        $this->kecamatanModel->save([
            'nama_kecamatan' => $nama_kecamatan,
            'kota_id' => $kota_id,
            'created_at' => date('Y-m-d'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/kecamatan');
    }

    public function Update()
    {
        $nama_kecamatan = $this->request->getPost('name');
        $id_kecamatan = $this->request->getPost('id_kecamatan');
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kecamatan harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'Nama kecamatan sudah ada');
            return redirect()->to('/kecamatan')->withInput();
        }
        $this->kecamatanModel->save([
            'nama_kecamatan' => $nama_kecamatan,
            'id_kecamatan' => $id_kecamatan,
            'kota_id' => $this->request->getPost('kota_id'),
            'updated_at' => date('Y-m-d'),
        ]);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/kecamatan');
    }

    public function Delete()
    {
        $this->kecamatanModel->delete($this->request->getPost('id_kecamatan'));
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/kecamatan');
    }
}