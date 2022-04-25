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
        $query = "SELECT * FROM auths WHERE uniqueid = $uid";
        $response = $db->query($query)->get();
        // $builder = $db->table('auths');
        // $builder->select('is_verified,uniqueid,account_created');
        // $builder->where('uniqueid',$uid);
        // $result = $builder->get();
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