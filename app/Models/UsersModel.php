<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model {
    protected $table = 'users';
    protected $allowedFields = ['id', 'complaint_id', 'username', 'password'];
    protected $useTimestamps = false;
}