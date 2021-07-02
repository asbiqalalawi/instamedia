<?php

namespace App\Models;

use CodeIgniter\Model;

class LikedModel extends Model
{
    protected $table = 'liked';
    protected $primaryKey = 'id_like';
    protected $allowedFields = ['id_post', 'user'];
}
