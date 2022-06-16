<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps  = true;
    protected $table = 'comments';
    protected $fillable = ['comment', 'post_id', 'user_id'];

    public static function boot()
    {
        //parent::userRegister();
    }
}
