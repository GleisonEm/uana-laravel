<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps  = true;
    protected $table = 'likes';
    protected $fillable = ['post_id', 'user_id'];

    public static function boot()
    {
        //parent::userRegister();
    }
}
