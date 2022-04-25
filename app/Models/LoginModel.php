<?php
namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{
    public function create($data)
    {
        $db = \Config\Database::connect();
        return $db->table('auths')->insert($data);
    }
    public function fetchSingle($uid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('auths');
        $builder->select('*');
        $builder->where('uid',$uid);
        $result = $builder->get();
        if($builder->countAll() == 1)
        {
            return $result->getRow();
        }
        else
        {
            return false;
        }
    }

}