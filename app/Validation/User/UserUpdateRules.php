<?php
namespace App\Validation\User;

class UserUpdateRules  {

    public function rules(){
        return [
            'fullname' => 'required|min_length[3]|max_length[255]',
        ];
    }

    public function messages(){
        return [
            'fullname' => [
                'required' => 'Xin vui lòng nhập vào trường họ và tên!',
                'min_length' => 'Họ và tên tối thiểu {param} ký tự!',
                'max_length' => 'Họ và tên tối đa {param} ký tự!'
            ],
        ];
    }
}