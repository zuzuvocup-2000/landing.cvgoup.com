<?php 
namespace App\Models;

use CodeIgniter\Model;

class WardModel extends Model
{
    protected $table = 'vn_ward';
    protected $allowedFields = [
        'wardid as id', 
        'name', 
        'districtid', 
    ];
}
