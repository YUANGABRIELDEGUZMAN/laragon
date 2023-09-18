<?php

namespace App\Controllers;

use App\Models\MainModel;
use App\Controllers\BaseController;

class MainController extends BaseController
{
    public function save()
    {
        $id = $_POST['id'];
        $data = [
            'studentID' => $this->request->getVar('studentID'),
            'FullName' => $this->request->getVar('FullName'),
            'YearLevel' => $this->request->getVar('YearLevel'),
            'Program' => $this->request->getVar('Program'),
        ];
        if($id!=null){
            $this->students->set($data)->where('id',$id)->update();
        }else{
            $this->students->save($data);
        }
        return redirect()->to('/product');
        $main = new MainModel();
        $main->save($data);
    }
    public function delete($id)
    {
        $main = new MainModel();
        $main->where('id, $id')->delete();
    }
    public function index()
    {
        $main = new MainModel();
        $data ['st'] = $main->findAll();
        return view('main',$data);
    }
}
