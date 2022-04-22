<?php

namespace App\Controllers;
use App\Models\AdminModel;

class Home extends BaseController
{
    public function index()
    {
        $mydata = [];
        $model = new AdminModel();
        $data = $model->RetriveData();
        if(!$data == false)
        {
            $mydata['data'] = $data;
        }
        return view('users/home',$mydata);
    }
}
