<?php
namespace App\Models;
use CodeIgniter\Model;

class CommentModel extends Model {
    protected $table = 'comment';
    
    protected $primaryKey = 'comment_id';

    protected $allowedFields = ['webboard_id','user_id','comment','time_comment'];
}