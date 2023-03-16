<?php

namespace App\Controllers;
// use App\Constants\UserConstants;

class Home extends BaseController
{
    public function index()
    {
        // echo UserConstants::MY_CONSTANT_1;die();
        return view('welcome_message');
    }
}
