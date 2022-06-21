<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        return view('Header_view')
        . view('Main_view')
        . view('Footer_view');
    }
}
