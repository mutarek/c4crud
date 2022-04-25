<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;
 class Login extends Controller
 {
     public function createAccount()
     {
        helper('form');
        if($this->request->getMethod() == "post")
        {
            $uid = md5(str_shuffle('abcdefghijklmnopqrst'.time()));
            $data = [
                'name'=>$this->request->getVar('username'),
                'psw'=> password_hash($this->request->getVar('psw'),PASSWORD_DEFAULT),
                'email'=>$this->request->getVar('email'),
                'number'=>$this->request->getVar('number'),
                'uniqueid'=>$uid,
            ];
            $login = new LoginModel();
            if($login->create($data))
            {
                $session = session();
                    $email = \Config\Services::email();
                    $to = $this->request->getVar('email');
                    $subject = 'Crud Web Application Account Activation Link - Dhaka City';
                    $msg = "Hey!".$this->request->getVar('username',FILTER_SANITIZE_STRING)."<br> <br> For Activate your valuable account . Please click the link below <br> <br>"
                    ."<a href='".base_url()."/login/activate/".$uid."'>Activate Now </a><br><br>";
                    $email->setTo($to);
                    $email->setFrom('bangladeshtourist@gmail.com','Activation Link');
                    $email->setSubject($subject);
                    $email->setMessage($msg);
                    if($email->send())
                    {
                        $session->setTempdata('success','Account Create Successfully,We send a link for verifying your email ,plese click and verify',3);
                        return redirect()->to(current_url());
                    }
                    else
                    {
                        $data = $email->printDebugger(['headers']);
                        print_r($data);
                    }
            }
            else
            {
                echo "error";
            }
        } 
        return view('signup');
     }
     public function activate($uid)
     {
        $data = [];
        if(!empty($uid))
        {
            $rmodel = new LoginModel();
            $result = $rmodel->fetchSingle($uid);
            print_r($result);
            echo 'h';
            if($result)
            {
                if($this->verifyTime($result->account_created))
                {
                    if($result->is_verified == 1)
                    {
                        $data['success'] = "Your Account is already Active";
                    }
                    else
                    {

                    }
                }
                else
                {
                    $data['error'] = "Sorry! Your Activation Time is expired ,Contact Admin";
                }
            }
            else
            {
                $data['error'] = "Sorry! Account Not exist";
            }
        }
        else
        {
            $data['error'] = "Sorry! Unable to process your request";
        }
         return view('activate',$data);
     }
     public function verifyTime($regtime)
     {
        $current_time = now();
        $reg =  strtotime($regtime);
        $differnce = $current_time - $reg;
        if($differnce < 3600)
        {
            return true;
        }
        else
        {
            return false;
        }
     }
 }