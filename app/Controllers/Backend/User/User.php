<?php
namespace App\Controllers\Backend\User;
use App\Controllers\BaseController;
use Jenssegers\Blade\Blade;

class User extends BaseController{
    public function __construct(){
        $this->data = [];
    }

    public function index(){

        $this->data['template'] = 'backend/user/user/index';
        $this->data['title'] = 'Danh sách tài khoản';
        return view('backend/dashboard/layout/home', $this->data);
    }

    public function create(){

        $this->data['template'] = 'backend/user/user/store';
        $this->data['title'] = 'Thêm mới tài khoản';
        return view('backend/dashboard/layout/home', $this->data);
    }
}