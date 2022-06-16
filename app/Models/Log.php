<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model 
{
    public $timestamps  = false;
	protected $table = 'logs';
	protected $fillable = ['datetime', 'table', 'action', 'message', 'user_id', 'ip'];

//- RELACIONAMENTO COM USUÁRIOS (One to One) -----------------------------------------------
    public function user() 
    {
        return $this->belongsTo(User::class);   
    }

//- TIPO DE LOG ---------------------------------------------------------------------------
	public function actionLog($action = null) 
    {
		$actions = [
			'I' => 'Incluir',
			'A' => 'Alterar',
			'E' => 'Excluir',			
		];
		if (!$action)
			return $actions;
		return $actions[$action];
	}

}
