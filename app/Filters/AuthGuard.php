<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null){
        $session = session();
        $cookie = $request->getCookie('remember_token');
        $this->userRepository = service('UserRepository');
        if (!$session->has('user')) {
            if (isset($cookie)) {
                $user = $this->userRepository->getUserByToken($cookie);
                if (isset($user)) {
                    $session->set('user', $user);
                } else {
                    set_cookie('remember_token', '', time() - 3600);
                }
            } else {
                return redirect()->to(BASE_URL.'/admin');
            }
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
        
    }
}