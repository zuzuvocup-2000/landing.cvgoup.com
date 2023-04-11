<?php
namespace App\Services;
use App\Libraries\Pagination;

class UserService{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = service('UserRepository');
        $this->pagination = new Pagination();
    }

    public function createUser($request)
    {
        $data = $this->storeUser($request, 'create');
        $create = $this->userRepository->createUser($data);
        return $create;
    }

    public function updateUser($id, $request)
    {
        $data = $this->storeUser($request, 'update');
        $update = $this->userRepository->updateUser($id, $data);
        return $update;
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }

    public function getuserById($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function getPaginateUser($request, $page = 1){
        $data = [];
        $param = [
            'perpage' => $request->getGet('perpage') ?? 20,
            'page' => $page,
            'search' => $this->condition_keyword($request),
        ];

        $config['total_rows'] = $this->userRepository->getTotalUsersBySearch($param);
        if($config['total_rows'] > 0){
            $config = pagination_config_bt(['url' => 'backend/user/user/index','perpage' => $param['perpage'],'perpage' => $param['perpage']], $config , $param['page']);
            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();
            $totalPage = ceil($config['total_rows']/$param['perpage']);
            $param['page'] = ($param['page'] > $totalPage)?$totalPage:$param['page'];
            $param['page'] = $param['page'] - 1;
            $data = $this->userRepository->getUsersBySearch($param);
        }
        return [
            'data' => $data,
            'paginate' => isset($pagination) ? $pagination : '',
            'total' => $config['total_rows'],
            'current' => $param['page'],
            'perpage' => $param['perpage'],
        ];
    }

    public function storeUser($request, $method){
        $data = [
            'fullname' => $request->getPost('fullname'),
            'phone' => $request->getPost('phone'),
            'birthday' => $request->getPost('birthday'),
            'gender' => $request->getPost('gender'),
            'address' => $request->getPost('address'),
            'cityid' => $request->getPost('cityid'),
            'districtid' => $request->getPost('districtid'),
            'wardid' => $request->getPost('wardid'),
            'publish' => $request->getPost('publish'),
            'image' => $request->getPost('image'),
        ];

        if($method == 'create'){
            $data['created_at'] = currentTime();
            $data['email'] = $request->getPost('email');
            $data['password'] = password_hash($request->getPost('password'), PASSWORD_DEFAULT);
        }else{
            $data['updated_at'] = currentTime();
        }

        return $data;
    }

    private function condition_keyword($request){
        $keyword = $request->getGet('keyword');
        if(!empty($keyword)){
            $keyword = '(fullname LIKE \'%'.$keyword.'%\' OR address LIKE \'%'.$keyword.'%\' OR email LIKE \'%'.$keyword.'%\' OR phone LIKE \'%'.$keyword.'%\')';
        }
        return $keyword;
    }
}