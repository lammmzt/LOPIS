<?php 
namespace App\Models;

use CodeIgniter\Model;


class kelurahanModel extends Model
{
    protected $table = 'Kelurahan';
    protected $primaryKey = 'id_kelurahan';
    protected $allowedFields = ['nama_kelurahan', 'kecamatan_id','created_at', 'updated_at'];

    public function getKelurahan($id = false){
        if($id == false){
            return $this
            ->join('kecamatan', 'Kelurahan.kecamatan_id = kecamatan.id_kecamatan')
            ->findAll();
        }else{
            return $this
            ->join('kecamatan', 'kelurahan.kecamatan_id = kecamatan.id_kecamatan')
            ->where('id_kelurahan', $id)
            ->first();
        }
    }
    
}

?>