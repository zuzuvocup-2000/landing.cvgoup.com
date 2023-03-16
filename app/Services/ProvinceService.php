<?php
namespace App\Services;

class ProvinceService{
    protected $provinceRepository;

    public function __construct()
    {
        $this->provinceRepository = service('ProvinceRepository');
    }

    public function getLocation($request)
    {
        $post = $request->getPost('param');
        if($post && is_array($post) && count($post)){
            if($post['table'] == 'vn_district') {
                $object = $this->provinceRepository->getAllDistrictsByCityid($post['where'], $post['select']);
            } else if($post['table'] == 'vn_ward') {
                $object = $this->provinceRepository->getAllWardsByDistrictid($post['where'], $post['select']);
            }
            if($object && is_array($object) && count($object)){
                $html = '<option value="0">'.$post['text'].'</option>';
                if($object && is_array($object) && count($object)){
                    foreach($object as $key => $val){
                        $html = $html . '<option value="'.$val['id'].'">'.$val['name'].'</option>';
                    }
                }
                return $html;
            }
        }
        return '';
    }
}