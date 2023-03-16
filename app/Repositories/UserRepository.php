<?php
namespace App\Repositories;

use App\Models\UserModel;

class UserRepository{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getUserByEmail($email)
    {
        return $this->userModel->where('email', $email)->first();
    }

    public function getAllUsers()
    {
        return $this->userModel->findAll();
    }

    public function getUserById($id)
    {
        return $this->userModel->find($id);
    }

    public function createUser($data)
    {
        return $this->userModel->insert($data);
    }

    public function updateUser($id, $data)
    {
        return $this->userModel->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->userModel->delete($id);
    }

    public function updateUserSession($userId, $sessionId)
    {
        $data = [
            'id' => $userId,
            'session_id' => $sessionId
        ];

        $this->userModel->save($data);
    }
}