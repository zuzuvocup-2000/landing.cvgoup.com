<?php 
namespace App\Models;

use CodeIgniter\Model;

class DistrictModel extends Model
{
    protected $table = 'vn_district';
    protected $allowedFields = [
        'districtid as id', 
        'name', 
        'provinceid', 
    ];
}
