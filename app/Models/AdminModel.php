<?php
namespace App\Models;
use CodeIgniter\Model;

class AdminModel extends Model
{
    public function InsertData($data)
    {
        $db = \Config\Database::connect();
        $response = $db->table('post')->insert($data);
        if($response)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function RetriveData()
    {
        $db = \Config\Database::connect();
        $response = $db->table('post')->get()->getResult();
        if(count($response)>0){
            return $response;
        }
        else
        {
            return false;
        }
    }
    public function RetriveSingle($title)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('post');
        $employee = $builder->select('post_title','post_desc','post_image')
                     ->where('post_title', $title)
                     ->get()>getResult();
        return $employee;
    }
}