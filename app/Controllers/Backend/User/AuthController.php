<?php

namespace App\Controllers;

use App\Services\AuthService;

class AuthController extends BaseController
{
    protected $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function login(){
        return view('login');
    }

    public function authenticate(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $result = $this->authService->login($username, $password);

        if ($result) {
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Invalid username or password.');
            return redirect()->to('/login');
        }
    }

    public function logout(){
        session()->destroy();

        return redirect()->to('/login');
    }
}