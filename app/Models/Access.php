<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model 
{
    public $timestamps = false;
    protected $table = 'accesses';
	protected $fillable = ['user_id', 'datetime', 'ip',	'action'];

//- RELACIONAMENTO COM USUÁRIOS (One to One) -----------------------------------------------
    public function user() 
    {
        return $this->belongsTo(User::class);   
    }

//- TIPO DE ACESSO ---------------------------------------------------------------------------
	public function typeAccess($type = null) 
    {
		$types = [
			'E' => 'Login',
			'S' => 'Logoff',
		];
		if (!$type)
			return $types;
		return $types[$type];
	}

}
