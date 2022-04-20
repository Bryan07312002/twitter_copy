<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable =[
        'user_id',
        'description',
        'link',
        'birth_date',
        'profile_photo_path',
        'profile_banner_path'
    ];
    protected $primaryKey = null;
    public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
