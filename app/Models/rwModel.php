<?php 
namespace App\Models;

use CodeIgniter\Model;


class rwModel extends Model
{
    protected $table = 'rw';
    protected $primaryKey = 'id_rw';
    protected $allowedFields = ['nama_rw', 'kelurahan_id','created_at', 'updated_at'];

    public function getrw($id = false){
        if($id == false){
            return $this
            ->join('kelurahan', 'rw.kelurahan_id = kelurahan.id_kelurahan')
            ->findAll();
        }else{
            return $this
            ->join('kelurahan', 'rw.kelurahan_id = kelurahan.id_kelurahan')
            ->where('id_rw', $id)
            ->first();
        }
    }
    
}

?>