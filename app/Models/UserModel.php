<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'fullname', 
        'phone', 
        'email',
        'password', 
        'gender', 
        'birthday', 
        'address', 
        'wardid', 
        'districtid', 
        'cityid', 
        'publish', 
        'deleted_at', 
        'userid_created', 
        'userid_updated', 
    ];

    public function authenticate($email, $password){
        $user = $this->where('email', $email)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
