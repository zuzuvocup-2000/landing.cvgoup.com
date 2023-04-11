<?php
namespace App\Validation\User;

class UserCreateRules  {
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = service('UserRepository');
    }

    public function rules(){
        return [
            'fullname' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|check_email_user',
            'password' => 'required|min_length[6]',
        ];
    }

    public function messages(){
        return [
            'fullname' => [
                'required' => 'Xin vui lòng nhập vào trường họ và tên!',
                'min_length' => 'Họ và tên tối thiểu {param} ký tự!',
                'max_length' => 'Họ và tên tối đa {param} ký tự!'
            ],
            'email' => [
                'required' => 'Xin vui lòng nhập vào trường Email!',
                'valid_email' => 'Định dạng Email không hợp lệ!',
                'check_email_user' => 'Email đã tồn tại trong hệ thống!'
            ],
            'password' => [
                'required' => 'Xin vui lòng nhập vào trường mật khẩu!',
                'min_length' => 'Mật khẩu tối thiểu {param} ký tự!',
            ],
        ];
    }

    public function check_email_user(string $email = ''){
        $email = trim($email);
        $user = $this->userRepository->getUserByEmail($email);
        if(isset($user) && is_array($user) && count($user)){
            return false;
        }
        return true;
    }
}