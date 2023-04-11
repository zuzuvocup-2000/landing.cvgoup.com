<?php
namespace App\Controllers\Backend\User;
use App\Controllers\BaseController;
use App\Validation\User\UserCreateRules;
use App\Validation\User\UserUpdateRules;

class User extends BaseController{
    protected $userCreateRules;
    protected $userUpdateRules;
    protected $userService;

    public function __construct(){
        $this->userCreateRules = new UserCreateRules();
        $this->userUpdateRules = new UserUpdateRules();
        $this->userService = service('UserService');
        $this->data['module'] = 'user';
    }

    public function index($page = 1){
        $this->data['userList'] = $this->userService->getPaginateUser($this->request, $page);
        $this->data['template'] = 'backend/user/user/index';
        $this->data['title'] = 'Danh sách tài khoản';
        return view('backend/dashboard/layout/home', $this->data);
    }

    public function create(){
        if($this->request->getMethod() == 'post'){
            if ($this->validate($this->userCreateRules->rules(), $this->userCreateRules->messages())){
                $insert = $this->userService->createUser($this->request);
                if($insert > 0){
                    $this->session->setFlashdata('message-success', 'Thêm mới tài khoản thành công!');
                    return redirect()->to(BASE_URL.'backend/user/user/index');
                }
            }else{
                $this->data['validate'] = $this->validator->getErrors();
            }
        }
        $this->data['template'] = 'backend/user/user/store';
        $this->data['title'] = 'Thêm mới tài khoản';
        return view('backend/dashboard/layout/home', $this->data);
    }

    public function update($id = 0){
        $this->data['user'] = $this->userService->getuserById($id);
        if(!$this->data['user'] || !is_array($this->data['user']) || count($this->data['user']) == 0){
            $this->session->setFlashdata('message-danger', 'Tài khoản không tồn tại!');
            return redirect()->to(BASE_URL.'backend/user/user/index');
        }
        if($this->request->getMethod() == 'post'){
            if ($this->validate($this->userUpdateRules->rules(), $this->userUpdateRules->messages())){
                $update = $this->userService->updateUser($id, $this->request);

                if($update > 0){
                    $this->session->setFlashdata('message-success', 'Cập nhật tài khoản thành công!');
                    return redirect()->to(BASE_URL.'backend/user/user/index');
                }
            }else{
                $this->data['validate'] = $this->validator->getErrors();
            }
        }
        $this->data['template'] = 'backend/user/user/store';
        $this->data['title'] = 'Chỉnh sửa tài khoản';
        return view('backend/dashboard/layout/home', $this->data);
    }

    public function delete(){
        $id = $this->request->getPost('id');
        $this->data['user'] = $this->userService->getuserById($id);
        if(!$this->data['user'] || !is_array($this->data['user']) || count($this->data['user']) == 0){
            echo json_encode([
                'code' => 400,
                'message' => 'Tài khoản không tồn tại trong hệ thống!'
            ]);die();
        }else{
            $delete = $this->userService->deleteUser($id);
            if($delete > 0) {
                echo json_encode([
                    'code' => 200,
                    'message' => 'Xóa tài khoản thành công!'
                ]);die();
            }else{
                echo json_encode([
                    'code' => 400,
                    'message' => 'Xin vui lòng thử lại!'
                ]);die();
            }
        }
    }
}