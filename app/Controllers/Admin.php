<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\AdminModel;


class Admin extends Controller
{
    public function __construct() {
    helper('form');
    }
    public function dashboard()
    {
        $data =[];
        $rules = [
            'name'=>'required',
            'descr'=>'required',
            'filetoupload'=>'uploaded[filetoupload]|is_image[filetoupload]',
            'category'=>'required'
        ];
        if($this->request->getMethod() == "post")
        {
            if($this->validate($rules))
            {
                echo 'can';
            }
            else
            {
               $data['fielderror'] = $this->validator;
            }
        }
        return view('admin/dashboardview',$data);
    }
    public function index()
    {
        $data = [];
        $rules = [
            'upload'=>[
                'rules'=>'uploaded[upload]|is_image[upload]|mime_in[upload,image/jpg,image/jpeg,image/gif,image/png,image/webp]|max_size[upload,2000]|max_dims[upload,1024,768]',
                'errors'=>[
                    'uploaded'=>'দয়া করে একটি ইমেজ আপলোড দিন ',
                ]
            ],
            'title'=>[
                'rules'=>'required|min_length[10]',
                'errors'=>[
                    'required'=>'দয়া করে টাইটেল টি দিন '
                ]
            ],
            'desc'=>[
                'rules'=>'required|min_length[10]',
                'errors'=>[
                    'required'=>'দয়া করে ডেসক্রিপশন টি দিন '
                ]
            ],
        ];
        if($this->request->getMethod() == "post")
        {
            if($this->validate($rules))
            {
                if($allimage = $this->request->getFiles())
                {
                    foreach($allimage['upload'] as $img)
                    {
                        
                        $filename = $img->getRandomName();
                        if($img->isValid())
                        {
                            if($img->move(FCPATH.'public/assets/',$filename))
                            {
                                $data = [
                                    'post_title'=>$this->request->getVar('title'),
                                    'post_content'=>$this->request->getVar('desc'),
                                    'post_image'=>$filename
                                ];
                                $model = new AdminModel();
                                $res = $model->InsertData($data);
                                if($res)
                                {
                                    echo "Data inserted sucessfullly";
                                }
                                else
                                {
                                    echo "error";
                                }

                            }
                            else
                            {
                                echo "Something wwrong";
                            }
                        }
                    }
                }
            }
            else
            {
                $data['allerror'] = $this->validator;
            }
        }
        return view('admin/addpost',$data);
    }
    public function FullArticle($title)
    {
        $mymodel = new AdminModel();
        $data['data'] = $mymodel->RetriveSingle($title);
        return view('users/fullarticle',$data);
    }
}