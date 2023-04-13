<?php
namespace App\Services;
use App\Libraries\Pagination;
use App\Libraries\Mailbie;

class AuthService{
    protected $userRepository;

    public function __construct(){
        $this->userRepository = service('UserRepository');
        $this->pagination = new Pagination();
        $this->session = session();
        helper(['text', 'mytemplate']);
    }

    public function checkAuth($request, $user){
        if(isset($user) && is_array($user) && count($user)){
            $param = [
                'email' => $request->getPost('email'),
                'password' => $request->getPost('password'),
            ];
            $pass = $user['password'];
            $authenticatePassword = password_verify($param['password'], $pass);
            if($authenticatePassword){
                return true;
            }
        }

        return false;
    }

    public function setSessionLogin($request, $user){
        $token = bin2hex(random_bytes(32));
        $this->userRepository->updateUserToken($user['id'], $token);
        $remember = $request->getPost('remember');
        if ($remember == 1) {
            setcookie('remember_token', $token, time() + 60*60*24*7, "/"); // 7 days
        }

        $this->session->set('user', $user);
    }

    public function updateTimeLogin($request, $user){
        return $this->userRepository->updateUser($user['id'], ['login_at' => currentTime()]);
    }

    public function getUserByEmail($email){
        return $this->userRepository->getUserActiveByEmail($email);
    }

    public function logoutUser(){
        $user = $this->session->get('user');
        if (isset($user)) {
            $this->userRepository->updateUserToken($user['id'], ''); // Remove token from database
        }
        $this->session->destroy(); // Destroy session
        setcookie('remember_token', null, -1, '/'); // Remove cookie
    }

    public function forgotPassword($request, $user){
        $otp = $this->otp(); 
        $otp_live = $this->otp_time();
        $mailbie = new MailBie();
        $otpTemplate = otp_template([
            'fullname' => $user['fullname'],
            'otp' => $otp,
        ]);

        $flag = $mailbie->send([
            'to' => $user['email'],
            'subject' => 'Quên mật khẩu cho tài khoản: '.$user['email'],
            'messages' => $otpTemplate,
        ]);
        $update = [
            'otp' => $otp,
            'otp_live' => $otp_live,
        ];
        
        $countUpdate = $this->userRepository->updateUser($user['id'], $update);
        return $countUpdate;
    }

    public function changePasswordForgot($request, $user){
        $mailFlag = false;
        $password = random_string('numeric', 6);
        $update = [
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $countUpdate = $this->userRepository->updateUser($user['id'], $update);
        if($countUpdate > 0){
            $mailbie = new Mailbie();
            $mailFlag = $mailbie->send([
                'to' => $user['email'],
                'subject' => 'Quên mật khẩu cho tài khoản: '.$user['email'],
                'messages' => '<h3>Mật khẩu mới của bạn là: '.$password.'</h3><div><a target="_blank" href="'.base_url('admin').'">Click vào đây để tiến hành đăng nhập</a></div>',
            ]);
        }

        return $mailFlag;
    }

    private function otp(){
        $otp = random_string('numeric', 6);
        return $otp;
    }

    private function otp_time(){
        $timeToLive = gmdate('Y-m-d H:i:s', time() + 7*3600 + 300);
        return $timeToLive;
    }
}