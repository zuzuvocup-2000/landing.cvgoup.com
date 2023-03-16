<?php
namespace App\Controllers\Backend\Dashboard;
use App\Controllers\BaseController;
use Jenssegers\Blade\Blade;

class Dashboard extends BaseController{
    public function __construct(){
        $this->data = [];
    }

    public function index(){

        $this->data['template'] = 'backend/dashboard/home/index';
        $this->data['module'] = 'dashboard';
        return view('backend/dashboard/layout/home', $this->data);
    }
}