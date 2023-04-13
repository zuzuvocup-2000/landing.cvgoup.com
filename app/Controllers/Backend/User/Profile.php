<?php
namespace App\Controllers\Backend\User;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Validation\User\UserUpdateRules;

class Profile extends BaseController{
    protected $userUpdateRules;
    protected $userService;
    protected $userModel;

    public function __construct(){
        $this->userUpdateRules = new UserUpdateRules();
        $this->userService = service('UserService');
        $this->userModel = new UserModel();
        $this->data['module'] = 'user';
    }

    public function update(){
        $user = getCurrentUser();
        $this->data['user'] = $this->userService->getuserById($user['id']);
        if(!$this->data['user'] || !is_array($this->data['user']) || count($this->data['user']) == 0){
            $this->session->setFlashdata('message-danger', 'Tài khoản không tồn tại!');
            return redirect()->to(BASE_URL.'admin/logout');
        }
        if($this->request->getPost('update')){
            if ($this->validate($this->userUpdateRules->rules(), $this->userUpdateRules->messages())){
                $data = [
                    'fullname' => $this->request->getPost('fullname'),
                    'phone' => $this->request->getPost('phone'),
                    'birthday' => $this->request->getPost('birthday'),
                    'gender' => $this->request->getPost('gender'),
                    'address' => $this->request->getPost('address'),
                    'cityid' => $this->request->getPost('cityid'),
                    'districtid' => $this->request->getPost('districtid'),
                    'wardid' => $this->request->getPost('wardid'),
                    'image' => $this->request->getPost('image'),
                    'updated_at' => currentTime(),
                ];
                $update = $this->userModel->update($user['id'], $data);

                if($update > 0){
                    $this->session->setFlashdata('message-success', 'Cập nhật tài khoản thành công!');
                    return redirect()->to(BASE_URL.'backend/user/profile/update');
                }
            }else{
                $this->data['validate'] = $this->validator->getErrors();
            }
        }
        if($this->request->getPost('reset')){
            $validation = $this->validation_pass($this->data['user']);
            if($this->validate($validation['validate'],$validation['errorValidate'])){
                $update = $this->store();
                $flag = $this->AutoloadModel->_update([
                    'table'=> 'users',
                    'data' => $update, 
                    'where' => ['id' => $user['id'], 'deleted_at' =>0]
                ]);
                if($flag > 0){
                    $this->session->setFlashdata('message-success', 'Cập nhật người dùng Thành Công');
                    return redirect()->to(BASE_URL.'backend/user/profile/update');
                }    
            }else{
                $this->data['validate'] = $this->validator->getErrors();
                $this->session->setFlashdata('message-danger', 'Đổi mật khẩu không thành công! Xin vui lòng thử lại!');
            }
        }
        $this->data['template'] = 'backend/user/profile/update';
        $this->data['title'] = 'Cập nhật tài khoản';
        return view('backend/dashboard/layout/home', $this->data);
    }

    private function store(){
        $store = [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'updated_at' => $this->currentTime
        ];
        
        return $store;
    }

    private function validation_pass($user = []){
        $validate = [
            'old-password' => 'min_length[6]|check_pass['.$user['id'].']',
            'password' => 'required|min_length[6]',
            're_password' => 'required|matches[password]',

        ];
        $errorValidate = [
            'old-password' => [
                'min_length' => 'Mật khẩu tối thiểu 6 kí tự!',
                'check_pass' => 'Mật khẩu cũ không đúng!',
            ],
            'password' => [
                'required' => 'Xin vui lòng nhập mật khẩu mới!',
                'min_length' => 'Mật khẩu tối thiểu 6 kí tự!',
            ],
            're_password' => [
                'required' => 'Xin vui lòng nhập lại mật khẩu mới!',
                'matches' => 'Mật khẩu nhập lại không khớp!',
            ],
        ];

        return [
            'validate' => $validate,
            'errorValidate' => $errorValidate
        ];
    }
}