<?php

namespace App\Controllers;
use App\Models\ComplaintFilesModel;
use App\Models\ComplaintModel;
use App\Models\UsersModel;
use CodeIgniter\Controller;

class FollowController extends BaseController {
    public function index() {
        return  view('header').
                view('Follow').
                view('footer');
    }

    public function login() {
        $model = new UsersModel();
        $data = request()->getJSON(true);

        $username = $data['username'];
        $password = $data['password'];

        $user = $model->where('username', $username)->first();


        if($user && password_verify($password, $user['password'])){
           return $this->response->setJSON(['status' => 'ok', 'message' => 'login is successful', 'complaint_id' => $user['complaint_id']]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Username or password is not correct']);
        }
    }

    public function user($complaint_id) {
        $model = new ComplaintModel();
        $filesModel = new ComplaintFilesModel();

        $data = $model->where('id', $complaint_id)->first();

        $files = $filesModel->where('complaint_id', $complaint_id)->findAll();

        $data['files'] = $files;

        return  view('header').
                view('FollowComplaint', $data).
                view('footer');
    }
}