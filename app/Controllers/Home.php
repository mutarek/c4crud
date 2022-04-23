<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['data'] = $model->orderBy('post_id','DESC')->findAll();
        return view('users/home',$data);
    }
    public function ShowSingle($id = null)
    {
        $model = new UserModel();
        $data['singledata'] = $model->where('post_id',$id)->first();
        return view('users/singlepost',$data);
    }
    public function EditPost($id = null)
    {
        helper('form');
        $model = new UserModel();
        $data['singledata'] = $model->where('post_id',$id)->first();
        return view('users/editpost',$data);
    }
    public function UpdatePost()
    {
        $id = $this->request->getVar('id');
        if($this->request->getMethod() == "post")
        {
            $files = $this->request->getFile('upload');
            if(!$files ==null)
            {
                $newfile = $files->getRandomName();
                $files->move(FCPATH.'public/assets/',$newfile);
            }
            else
            {
                $newfile = $this->request->getVar('eximage');
            }
            $data = [
                'post_title'=>$this->request->getVar('title'),
                'post_content'=>$this->request->getVar('desc'),
                'post_image'=> $newfile,
            ];
            $model = new UserModel();
            if($model->update($id,$data))
            {
                return redirect()->to(base_url('home'));
            }
            else
            {
                echo "Error";
            }
        }
    }
}
