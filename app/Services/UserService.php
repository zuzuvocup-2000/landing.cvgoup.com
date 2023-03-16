<?php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data)
    {
        // Thực hiện các nghiệp vụ để tạo tài khoản
        // ...

        // Lưu tài khoản vào cơ sở dữ liệu
        $this->userRepository->create($data);
    }

    public function updateUser($id, array $data)
    {
        // Thực hiện các nghiệp vụ để cập nhật tài khoản
        // ...

        // Cập nhật tài khoản vào cơ sở dữ liệu
        $this->userRepository->update($id, $data);
    }

    public function deleteUser($id)
    {
        // Thực hiện các nghiệp vụ để xóa tài khoản
        // ...

        // Xóa tài khoản khỏi cơ sở dữ liệu
        $this->userRepository->delete($id);
    }

    public function getuserById($id)
    {
        // Lấy tài khoản từ cơ sở dữ liệu
        return $this->userRepository->findById($id);
    }

    public function getAllusers()
    {
        // Lấy danh sách tài khoản từ cơ sở dữ liệu
        return $this->userRepository->findAll();
    }
}