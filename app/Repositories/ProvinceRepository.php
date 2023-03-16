<?php
namespace App\Repositories;

use App\Models\ProvinceModel;
use App\Models\DistrictModel;
use App\Models\WardModel;

class ProvinceRepository{
    protected $provinceModel;
    protected $districtModel;
    protected $wardModel;

    public function __construct()
    {
        $this->provinceModel = new ProvinceModel();
        $this->districtModel = new DistrictModel();
        $this->wardModel = new WardModel();
    }

    public function getAllProvince()
    {
        return $this->provinceModel->orderBy('order', 'desc')->findAll();
    }

    public function getAllDistrictsByCityid($where, $select)
    {
        return $this->districtModel->select($select)->where($where)->orderBy('name', 'asc')->findAll();
    }

    public function getAllWardsByDistrictid($where, $select)
    {
        return $this->wardModel->select($select)->where($where)->orderBy('name', 'asc')->findAll();
    }
}