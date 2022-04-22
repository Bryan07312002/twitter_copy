<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Profile;
use App\Models\Retweet;
use App\Models\Bookmark;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
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

    public function like(){
        return $this->hasMany(like::class);
    }

    public function retweet(){
        return $this->hasMany(Retweet::class);
    }

    public function bookmark(){
        return $this->hasMany(Bookmark::class);
    }
    public function user_profile(){
        return $this->hasOneThrough(Profile::class,User::class,'id','user_id','id','id');
    }
}
