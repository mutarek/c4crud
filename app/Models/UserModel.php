<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'post_id';
    protected $allowedFields = ['post_title', 'post_image','post_content'];
}