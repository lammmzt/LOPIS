<?php 
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard - LOPIS',
            'menu' => 'Dashboard',
            'sub_menu' => '',
        ];
        return view('Admin/Dashboard/index', $data);
    }
}