<?php 
namespace App\Controllers;

use App\Models\kotaModel;


class Kota extends BaseController{

    protected $kotaModel;
    
    public function __construct()
    {
        $this->kotaModel = new kotaModel();
    }

    public function index(){
        $data = [
            'title' => 'Kota - LOPIS',
            'menu' => 'Kota',
            'sub_menu' => 'Dashboard',
            'kota' => $this->kotaModel->findAll(),
        ];
        
        return view('Admin/Kota/index', $data);
    }
}


?>