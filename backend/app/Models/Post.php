<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable =[
        'post_reference_id',
        'user_id',
        'content',
        'has_img',
    ];

    public function comentario(){
        return $this->HasOne(Post::class,'post_reference_id');
    }

    public function belosngsPost(){
        return $this->belongsTo(Post::class,'post_reference_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
