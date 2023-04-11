<?php
namespace App\Validation\Auth;

class VerifyRules  {
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = service('UserRepository');
    }

    public function rules(){
        return [
            'otp' => 'required|check_otp_user',
        ];
    }

    public function messages(){
        return [
            'otp' => [
                'required' => 'Xin vui lòng nhập vào trường OTP!',
                'check_otp_user' => 'Mã OTP không chính xác hoặc đã hết thời gian sử dụng!'
            ],
        ];
    }

    public function check_otp_user(string $otp = ''){
        $token = $_GET['token'];
        $token = json_decode(base64_decode($token), TRUE);

        if(!isset($token) || is_array($token) == false || count($token) == 0){
            return false;
        }
        $user = $this->userRepository->getUserActiveByEmail($token['email']);
        if(isset($user) && is_array($user) && count($user)){
            $currentTime = gmdate('Y-m-d H:i:s', time() + 7*3600);
            if(strtotime($currentTime) < strtotime($user['otp_live']) && $user['otp'] == $otp){
                return true;
            }
        }
        return false;
    }
}