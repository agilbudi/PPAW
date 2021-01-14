<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table= "posts";
    protected $fillable = ['id', 'iduser','status' ,'title', 'body','image', 'created_at', 'update_at']; 
   
}
