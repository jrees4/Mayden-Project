<?php

namespace App\Controllers;

helper('inflector');
use App\Models\Shopping_model;
use CodeIgniter\Model;

class Home extends BaseController
{
    public function index()
    {
        if ( ! session_id() ) @ session_start();

        // remove basket id
        // session_destroy();

        //  Could make this a global tbh.
        $model = model(Shopping_model::class);
        $id = false;

        if(isset($_SESSION['ListID'])){
            $id = $_SESSION['ListID'];
            
            $data = [
                'listID' => $model->getList($id),
            ];
        }

        return view('Header_view')
        . view('Main_view')
        . view('Footer_view');
    }
}
