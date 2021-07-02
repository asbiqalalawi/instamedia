<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'id_post';
    protected $allowedFields = ['user', 'image', 'description', 'date'];
}
