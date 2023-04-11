<?php

namespace Config;

use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    /* ======================================== Service ===================================================*/
    public static function AuthService($param = [], $getShared = true){
        if ($getShared){
            return static::getSharedInstance('AuthService', $param);
        }

        return new \App\Services\AuthService($param);
    }

    public static function ProvinceService($param = [], $getShared = true){
        if ($getShared){
            return static::getSharedInstance('ProvinceService', $param);
        }

        return new \App\Services\ProvinceService($param);
    }

    public static function UserService($param = [], $getShared = true){
        if ($getShared){
            return static::getSharedInstance('UserService', $param);
        }

        return new \App\Services\UserService($param);
    }


    /* ======================================== Repository ===================================================*/
    
    public static function ProvinceRepository($param = [], $getShared = true){
        if ($getShared){
            return static::getSharedInstance('ProvinceRepository', $param);
        }

        return new \App\Repositories\ProvinceRepository($param);
    }

    public static function UserRepository($param = [], $getShared = true){
        if ($getShared){
            return static::getSharedInstance('UserRepository', $param);
        }

        return new \App\Repositories\UserRepository($param);
    }
     
}
