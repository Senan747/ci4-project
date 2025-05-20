<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ComplaintFilesModel;
use App\Models\ComplaintModel;

class ComplaintController extends BaseController {
    public function index() {
        return view('header').
               view('Complaint').
               view('footer');
    }

    public function submitComplaint() {
        $model = new ComplaintModel();

        $data = $this->request->getJSON(true);


        if($model->insert($data)){
            $complaint_id = $model->getInsertID();

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
}