<?php

namespace App\Controllers;
use App\Models\AdminModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new AdminModel();
        $data = $model->findAll();
        // dd($data);
        return  view('header') . 
                view('HomeView') .
                view('footer');
    }
}
