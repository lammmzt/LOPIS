<?php 
namespace App\Models;

use CodeIgniter\Model;


class detailUsersModel extends Model
{
    protected $table = 'detail_user';
    protected $primaryKey = 'id_detail_user';
    protected $allowedFields = ['nama_user','jenis_kelamin', 'alamat_user','user_id','kelurahan_id','created_at', 'updated_at'];

    public function getDetailUsers($id = false){
        if($id == false){
            return $this
            ->select('users.*,detail_user.*,kelurahan.*')
            ->join('users','users.id_user = detail_user.user_id')
            ->join('kelurahan','kelurahan.id_kelurahan = detail_user.kelurahan_id')
            ->findAll();
        }else{
            return $this
            ->select('users.*,detail_user.*,kelurahan.*')
            ->join('users','users.id_user = detail_user.user_id')
            ->join('kelurahan','kelurahan.id_kelurahan = detail_user.kelurahan_id')
            ->where('id_detail_user', $id)
            ->first();
        }
    }
    
}

?>