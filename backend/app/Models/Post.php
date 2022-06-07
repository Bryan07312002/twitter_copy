<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Retweet;
use App\Models\Like;


class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function user(){
        return $this->hasOne(User::class);
    }
    public function retweets(){
        return $this->hasMany(Retweet::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
