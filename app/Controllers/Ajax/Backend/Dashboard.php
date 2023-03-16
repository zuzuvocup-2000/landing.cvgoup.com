<?php 
namespace App\Controllers\Ajax\Backend;
use App\Controllers\BaseController;

class Dashboard extends BaseController{
	protected $provinceService;

	public function __construct()
    {
        $this->provinceService = service('ProvinceService');
    }

	public function get_location(){
		echo json_encode([
			'html' => $this->provinceService->getLocation($this->request)
		]); die();
	}
}
