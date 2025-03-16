<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Sales extends Controller
{
    public function index()
    {
        return view('pages/sales', ['title' => 'Sales']);
    }
}
