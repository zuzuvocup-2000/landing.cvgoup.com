<?php
namespace App\Validation\Auth;

class LoginRules  {
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = service('UserRepository');
    }

    public function rules(){
        return [
            'email' => 'required|valid_email|check_email_active',
            'password' => 'required|min_length[6]',
        ];
    }

    public function messages(){
        return [
            'email' => [
                'required' => 'Xin vui lòng nhập vào trường Email!',
                'valid_email' => 'Định dạng Email không hợp lệ!',
                'check_email_active' => 'Tài khoản đã bị khóa hoặc không tồn tại trên hệ thống!'
            ],
            'password' => [
                'required' => 'Xin vui lòng nhập vào trường mật khẩu!',
                'min_length' => 'Mật khẩu tối thiểu {param} ký tự!',
            ],
        ];
    }

    public function check_email_active(string $email = ''){
        $email = trim($email);
        $user = $this->userRepository->getUserActiveByEmail($email);
        if(isset($user) && is_array($user) && count($user)){
            return true;
        }
        return false;
    }
}