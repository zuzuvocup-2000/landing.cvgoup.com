<?php
namespace App\Repositories;

use App\Models\UserModel;
use App\Models\AutoloadModel;

class UserRepository{
    protected $userModel;
    protected $pagination;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->AutoloadModel = new AutoloadModel();
        helper('mypagination');
    }

    public function getUserActiveByEmail($email){
        return $this->userModel->where(['email' => $email, 'deleted_at' => 0, 'publish' => 1])->first();
    }

    public function getUserByEmail($email){
        return $this->userModel->where(['email' => $email, 'deleted_at' => 0])->first();
    }

    public function getTotalUsersBySearch($param){
        return $this->AutoloadModel->_get_where([
            'select' => 'id',
            'table' => 'users',
            'keyword' => $param['search'],
            'where' => [
                'deleted_at' => 0
            ],
            'count' => TRUE
        ]);
    }

    public function getUsersBySearch($param) {   
        return $this->AutoloadModel->_get_where([
            'select' => '*',
            'table' => 'users',
            'keyword' => $param['search'],
            'where' => [
                'deleted_at' => 0
            ],
            'limit' => $param['perpage'],
            'start' => $param['page'] * $param['perpage'],
        ],true);
    }

    public function getUserByToken($token){
        return $this->userModel->where(['remember_token' => $token, 'deleted_at' => 0, 'publish' => 1])->find($id);
    }

    public function getUserById($id){
        return $this->userModel->where(['deleted_at' => 0])->find($id);
    }

    public function createUser($data){
        return $this->userModel->insert($data);
    }

    public function updateUser($id, $data){
        return $this->userModel->update($id, $data);
    }

    public function updateUserToken($id, $token){
        return $this->userModel->update($id, ['remember_token' => $token]);
    }

    public function deleteUser($id){
        return $this->userModel->update($id, ['deleted_at' => 1]);
    }
}