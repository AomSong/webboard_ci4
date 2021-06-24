<?php
namespace App\Models;
use CodeIgniter\Model;

class WebboardModel extends Model {
    protected $table = 'webboard';
    
    protected $primaryKey = 'webboard_id';

    protected $allowedFields = ['category_id','user_id','user_firstname','topic','webboard','num_comment','time_webboard'];
}