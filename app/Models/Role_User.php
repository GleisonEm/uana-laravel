<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model 
{
    public $timestamps  = false;
    protected $table = 'role_user';
    protected $fillable = ['role_id, user_id'];
}