<?php

namespace App\Models;

use CodeIgniter\Model;


class rwModel extends Model
{
    protected $table = 'rw';
    protected $primaryKey = 'id_rw';
    protected $allowedFields = ['nama_rw', 'kelurahan_id', 'created_at', 'updated_at'];

    public function getrw($id = false)
    {
        if ($id == false) {
            return $this
                ->select('rw.*, kelurahan.*, kecamatan.*, kota.*')
                ->join('kelurahan', 'rw.kelurahan_id = kelurahan.id_kelurahan')
                ->join('kecamatan', 'kelurahan.kecamatan_id = kecamatan.id_kecamatan')
                ->join('kota', 'kecamatan.kota_id = kota.id_kota')
                ->findAll();
        } else {
            return $this
                ->join('kelurahan', 'rw.kelurahan_id = kelurahan.id_kelurahan')
                ->join('kecamatan', 'kelurahan.kecamatan_id = kecamatan.id_kecamatan')
                ->join('kota', 'kecamatan.kota_id = kota.id_kota')
                ->where('id_rw', $id)
                ->first();
        }
    }
}
