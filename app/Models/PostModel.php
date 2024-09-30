<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    public function __construct()
        {
                $this->load->database();

        }




    public function get_posts(){

             $query=$this->db->get('posts');
            return $query->result_array();
    }
}
