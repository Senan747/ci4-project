<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ComplaintFilesModel;
use App\Models\ComplaintModel;
use App\Models\UsersModel;

class ComplaintController extends BaseController {
    public function index() {
        return view('header').
               view('Complaint').
               view('footer');
    }

    public function submitComplaint() {
        $model = new ComplaintModel();

        $data = $this->request->getJSON(true);

        // print_r($data); die;

        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $username = '';
        for ($i = 0; $i < 10; $i++) {
            $username .= $characters[rand(0, strlen($characters) - 1)];
        }

        if($model->insert($data)){
            $complaint_id = $model->getInsertID();

            session()->set([
                'complaint_id'  => $complaint_id,
                'username'      => $username,
                'isFormCompleted'    => true    
            ]);

            return $this->response->setStatusCode('201')->setJSON(['status' => 'ok', 'message' => 'Complaint created', 'id' => $complaint_id]);
        } else {
            return $this->response->setStatusCode('400')->setJSON(['message' => 'Complaint create failed']);
        }
    }

    public function submitFiles($id)
    {
        $files = $this->request->getFiles();
        $model = new ComplaintFilesModel();
        $uploadedFiles = [];
    
        if (isset($files['files'])) {
            foreach ($files['files'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/uploads', $newName);
    
                    $file_path = base_url('uploads/' . $newName);
    
                    $data = [
                        'complaint_id' => $id,
                        'file_path'    => $file_path,
                    ];
    
                    $model->insert($data);
                    $uploadedFiles[] = $file_path;
                }
            }
    
            return $this->response->setStatusCode(200)->setJSON([
                'message' => 'Files uploaded successfully',
                'files'   => $uploadedFiles
            ]);
        }
    
        return $this->response->setStatusCode(400)->setJSON([
            'error' => 'No files found'
        ]);
    } 
    
    public function register() {
        $data = [
            'username'      => session()->get('username')
        ];

        return view('header').
               view('Submit', $data).
               view('footer');
    }

    public function createUser() {
        $complaint_id = session()->get('complaint_id');
        $model = new UsersModel();
        $data = $this->request->getJson(true);

        $data['complaint_id'] = $complaint_id;
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if($model->insert($data)){
            return $this->response->setJSON(['status' => 'ok', 'message' => 'User created']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Insert failed']);
        }
    }
}