<?php 
namespace App\Models;

use CodeIgniter\Model;


class rtModel extends Model
{
    protected $table = 'rt';
    protected $primaryKey = 'id_rt';
    protected $allowedFields = ['nama_rt', 'rw_id','created_at', 'updated_at'];

    public function getrt($id = false){
        if($id == false){
            return $this
            ->join('rw', 'rt.rw_id = rw.id_rw')
            ->findAll();
        }else{
            return $this
            ->join('rw', 'rt.rw_id = rw.id_rw')
            ->where('id_rt', $id)
            ->first();
        }
    }
    
}

?>