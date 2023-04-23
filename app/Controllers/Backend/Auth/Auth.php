<?php
namespace App\Controllers\Backend\Auth;
use App\Controllers\BaseController;
use App\Validation\Auth\LoginRules;
use App\Validation\Auth\ForgotRules;
use App\Validation\Auth\VerifyRules;

class Auth extends BaseController{
    protected $authService;
    protected $loginRules;
    protected $forgotRules;
    protected $verifyRules;

    public function __construct(){
        $this->authService = service('AuthService');
        $this->loginRules = new LoginRules();
        $this->forgotRules = new ForgotRules();
        $this->verifyRules = new VerifyRules();
        $this->data['module'] = 'auth';
    }

    public function login(){
        if($this->request->getMethod() == 'post'){
            if ($this->validate($this->loginRules->rules(), $this->loginRules->messages())){
                $user = $this->authService->getUserByEmail($this->request->getPost('email'));
                $checkLogin = $this->authService->checkAuth($this->request, $user);
                if($checkLogin){
                    $this->authService->setSessionLogin($this->request, $user);
                    $this->authService->updateTimeLogin($this->request, $user);
                    $this->session->setFlashdata('message-success', 'Đăng nhập thành công!');
                    return redirect()->to(BASE_URL.'backend/dashboard/dashboard/index');
                }else{
                    $this->session->setFlashdata('message-danger', 'Sai tài khoản hoặc mật khẩu!');
                    return redirect()->to(BASE_URL.'admin');
                }
            }else{
                $this->data['validate'] = $this->validator->getErrors();
            }
        }

        // $user = $this->AutoloadModel->_get_where([
        //     'select' => '*',
        //     'table' => 'TBL_CONGTY'
        // ],true);

        // pre($user);
        $this->data['title'] = 'Đăng nhập';
        $this->data['template'] = 'backend/auth/template/login';
        return view('backend/auth/layout/layout', $this->data);
    }

    public function forgot(){
        if($this->request->getMethod() == 'post'){
            if ($this->validate($this->forgotRules->rules(), $this->forgotRules->messages())){
                $user = $this->authService->getUserByEmail($this->request->getPost('email'));
                if(isset($user)){
                    $countUpdate = $this->authService->forgotPassword($this->request, $user);
                    if($countUpdate > 0){
                        $this->session->setFlashdata('message-success', 'Mã OTP đã được gửi tới Email của bạn!');
                        return redirect()->to(BASE_URL.'admin/verify?token='.base64_encode(json_encode($user)));
                    }else{
                        $this->session->setFlashdata('message-danger', 'Có lỗi xảy ra, xin vui lòng thử lại!');
                        return redirect()->to(BASE_URL.'admin');
                    }
                }
            }else{
                $this->data['validate'] = $this->validator->getErrors();
            }
        }
        $this->data['title'] = 'Quên mật khẩu';
        $this->data['template'] = 'backend/auth/template/forgot';
        return view('backend/auth/layout/layout', $this->data);
    }

    public function verify(){
        if($this->request->getMethod() == 'post'){
            if ($this->validate($this->verifyRules->rules(), $this->verifyRules->messages())){
                $user = json_decode(base64_decode($_GET['token']), TRUE);
                $countUpdate = $this->authService->changePasswordForgot($this->request, $user);
                if($countUpdate == true){
                    $this->session->setFlashdata('message-success', 'Mật khẩu mới đã được gửi tới Email của bạn!');
                    return redirect()->to(BASE_URL.'admin');
                }else{
                    $this->session->setFlashdata('message-danger', 'Có lỗi xảy ra, xin vui lòng thử lại!');
                    return redirect()->to(BASE_URL.'admin');
                }
            }else{
                $this->data['validate'] = $this->validator->getErrors();
            }
        }
        $this->data['title'] = 'Xác nhận OTP';
        $this->data['template'] = 'backend/auth/template/verify';
        return view('backend/auth/layout/layout', $this->data);
    }

    public function logout(){
        $this->authService->logoutUser();
        return redirect()->to(BASE_URL.'admin');
    }
}