<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProvinceModel extends Model
{
    protected $table = 'vn_province';
    protected $allowedFields = [
        'provinceid', 
        'name', 
        'order', 
    ];
}
