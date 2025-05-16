<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class ComplaintController extends BaseController {
    public function index() {
        return view('header').
               view('Complaint').
               view('footer');
    }

    public function submitComplaint() {
        

        return view('header').
               view('Submit').
               view('footer');
    }
}