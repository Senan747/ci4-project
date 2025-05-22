<?php

namespace App\Models;
use CodeIgniter\Model;

class ComplaintModel extends Model {
    protected $table = 'complaints';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'surname', 'email', 'phone', 'location', 'event_date', 'hours_range', 'complain_details', 'people', 'status', 'response', 'responser', 'created_at'];
}