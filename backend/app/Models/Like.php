<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Like extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'post_id',
    ];

    
    protected $table = 'likes';

    public function is_unique($post_id,$user_id){
        $queryResult = Like::where('post_id',$post_id)->where('user_id', $user_id)->get();
        return isset($queryResult[0]);
        if($queryResult) return true;
        return false;
    }
    public function rules(){
        return [
            'post_id' => 'required|min:1|numeric',
        ];
    }
    public function likes(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
