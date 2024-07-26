<?php

namespace App\Models;

use CodeIgniter\Model;


class rtModel extends Model
{
    protected $table = 'rt';
    protected $primaryKey = 'id_rt';
    protected $allowedFields = ['nama_rt', 'rw_id', 'created_at', 'updated_at'];

    public function getrt($id = false)
    {
        if ($id == false) {
            return $this
                ->select('rt.*, rw.*, kelurahan.*, kecamatan.*, kota.*')
                ->join('rw', 'rt.rw_id = rw.id_rw')
                ->join('kelurahan', 'rw.kelurahan_id = kelurahan.id_kelurahan')
                ->join('kecamatan', 'kelurahan.kecamatan_id = kecamatan.id_kecamatan')
                ->join('kota', 'kecamatan.kota_id = kota.id_kota')
                ->findAll();
        } else {
            return $this
                ->join('rw', 'rt.rw_id = rw.id_rw')
                ->join('kelurahan', 'rw.kelurahan_id = kelurahan.id_kelurahan')
                ->join('kecamatan', 'kelurahan.kecamatan_id = kecamatan.id_kecamatan')
                ->join('kota', 'kecamatan.kota_id = kota.id_kota')
                ->where('id_rt', $id)
                ->first();
        }
    }
}
