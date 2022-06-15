<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Follower extends Model
{
    use HasFactory;
    protected $table = 'followers'; 

    public function followers(){
        return $this->belongsTo(User::class);
    }
    public function followed(){
        return $this->belongsTo(User::class);
    }
}
