<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id_comment';
    protected $allowedFields = ['id_post', 'user', 'text_comment'];
}
