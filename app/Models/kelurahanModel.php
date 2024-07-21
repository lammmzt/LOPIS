<?php

namespace App\Models;

use CodeIgniter\Model;


class kelurahanModel extends Model
{
    protected $table = 'Kelurahan';
    protected $primaryKey = 'id_kelurahan';
    protected $allowedFields = ['nama_kelurahan', 'kecamatan_id', 'created_at', 'updated_at'];

    public function getKelurahan($id = false)
    {
        if ($id == false) {
            return $this
                ->select('kelurahan.*, kecamatan.* , kota.*')
                ->join('kecamatan', 'Kelurahan.kecamatan_id = kecamatan.id_kecamatan')
                ->join('kota', 'kecamatan.kota_id = kota.id_kota')
                ->findAll();
        } else {
            return $this
                ->select('kelurahan.*, kecamatan.*')
                ->join('kecamatan', 'kelurahan.kecamatan_id = kecamatan.id_kecamatan')
                ->join('kota', 'kecamatan.kota_id = kota.id_kota')
                ->where('id_kelurahan', $id)
                ->first();
        }
    }
}