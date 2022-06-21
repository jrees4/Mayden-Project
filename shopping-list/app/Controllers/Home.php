<?php

namespace App\Controllers;

helper('inflector');
use App\Models\Shopping_model;
use CodeIgniter\Model;

class Home extends BaseController
{
    public function index()
    {
        //  Could make this a global tbh.
        $model = model(Shopping_model::class);

        $id = $_SESSION['ListID'];

        $data = [
            'listID' => $model->getList($id),
        ];

        return view('Header_view')
        . view('Main_view')
        . view('Footer_view');
    }
}
