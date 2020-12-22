<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'iduser','status' ,'title', 'body', 'created_at', 'update_at']; 
    protected $appends= ['status_label'];

    public function getStatusAttribute(){
        if ($this->status = 0){
            return '<span class="text-red-500">Draft</span>';
        }
        return '<span class="text-green-500">Publish</span>';
    }
}
