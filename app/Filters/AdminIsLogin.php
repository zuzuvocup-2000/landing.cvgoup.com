<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminIsLogin implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null){
        if (session()->get('user')){
            return redirect()->to(BASE_URL.'backend/dashboard/dashboard/index');
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
        
    }
}