<?php 
namespace App\Models;

use CodeIgniter\Model;


class kecamatanModel extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $allowedFields = ['nama_kecamatan', 'kota_id','created_at', 'updated_at'];

    public function getKecamatan($id = false){
        if($id == false){
            return $this
            ->join('kota', 'kecamatan.kota_id = kota.id_kota')
            ->findAll();
        }else{
            return $this
            ->join('kota', 'kecamatan.kota_id = kota.id_kota')
            ->where('id_kecamatan', $id)
            ->first();
        }
    }
    
}

?>