<?php 
namespace App\Validation;
use App\Models\AutoloadModel;
use CodeIgniter\HTTP\RequestInterface;

class UserRules {

	protected $AutoloadModel;
	protected $user;
	protected $helper = ['mystring'];
	protected $request;

	public function __construct(){
		$this->AutoloadModel = new AutoloadModel();
		$this->request = \Config\Services::request();
		helper($this->helper);

	}

	public function check_pass($oldPass = '', $id = 0): bool{

		$this->user = $this->AutoloadModel->_get_where([
			'table' => 'users',
			'select' => 'id, fullname, email,password',
			'where' => ['id' => $id]
		]);
		$authenticatePassword = password_verify($oldPass, $this->user['password']);
		if(!isset($this->user) || is_array($this->user) == false || count($this->user) == 0){
			return false;
		}
		if(!$authenticatePassword){
			return  false;
		}
		return true;
	}
}

