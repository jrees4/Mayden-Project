<?php

namespace App\Controllers;

helper('inflector');

use App\Models\Shopping_model;
use CodeIgniter\Model;

class Lists extends BaseController
{
    public function index()
    {
        if ( ! session_id() ) @ session_start();
        $model = model(Shopping_model::class);
        // $model = $this->load->model('Shopping_model');

        $data = [
            'test' => 'Test123',
        ];

        if(isset($_SESSION['ListID'])){
            $id = $_SESSION['ListID'];
            $listData = $model->getList($id);
             
            $data = [
                'listID' => $listData['_id'],
                'testID' => $_SESSION['ListID'],
                'foodIDs' => $listData['foodIDs'],
            ];
    
        }else{
            $this->create();
        }
        
        echo view('Header_view', $data);
        echo view('List_view', $data);
        echo view('Footer_view', $data);
    }

    public function create()
    {
        if ( ! session_id() ) @ session_start();
        if(!isset($_SESSION['ListID'])){
            $model = model(Shopping_model::class);

            $model->createList();

            return redirect();
        }else{
            echo 'You already have a list..';
            return redirect('index');
        }
    }

    public function delete($segment = null) {
        if (!empty($segment) && $this->request->getMethod() == 'get') {
            $model = model(Shopping_model::class);
            $model->deleteFood($segment);
        }

        return redirect()->to('Home');
    }
}