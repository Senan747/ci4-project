<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ComplaintFilesModel;
use App\Models\ComplaintModel;

class AdminController extends BaseController {
    public function index(){
        return view('Admin/Login');
    }

    public function login() {
        $model = new AdminModel();

        $user = request()->getJSON(true);

        if($model->where('email', $user['email'])->first()){
            return response()->setJSON(['status' => 'ok', 'message' => 'Login is successful']);
        } else {
            return response()->setJSON(['status' => 'error', 'idc']);
        }
    }

    public function admin(){
        $model = new ComplaintModel();

        $data['complaints'] = $model->findAll();
        return  view('header').
                view('Admin/Admin', $data).
                view('footer');
    }

    public function response($id) {
        $model = new ComplaintModel();
        $filesModel = new ComplaintFilesModel();
        $data['complaint'] = $model->where('id', $id)->first();
        $files = $filesModel->where('complaint_id', $id)->findAll();

        $data['files'] = $files;
    
        return view('header') .
               view('Admin/Response', $data) .
               view('footer');
    }

    public function setResponse($id) {
        $model = new ComplaintModel();

        $data = request()->getJSON(true);

        if($model->update($id, $data)){
            return response()->setJSON(['status' => 'ok', 'message' => 'Response successfully saved']);
        } else {
            return response()->setJSON(['status' => 'error', 'message' => 'error']);
        }

    }
}