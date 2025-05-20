<?php
namespace App\Models;
use CodeIgniter\Model;

class ComplaintFilesModel extends Model {
    protected $table = 'complaint_files';

    protected $primaryKey = 'id';

    protected $allowedFields = ['complaint_id', 'file_path'];
}