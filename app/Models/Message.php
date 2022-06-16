<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Message extends Model 
{
    public $timestamps  = false;
    protected $table = 'messages';
    protected $fillable = ['user_sender', 'user_receiver', 'message', 'datetime', 'status'];

//- RELACIONAMENTO COM USUÁRIOS (One to One) -----------------------------------------------
    public function usuarioSender() 
    {
        return $this->belongsTo(User::class, 'user_sender', 'id');
    } 

//- RELACIONAMENTO COM USUÁRIOS (One to One) -----------------------------------------------
    public function usuarioReceiver() 
    {
        return $this->belongsTo(User::class, 'user_receiver', 'id');
    } 
    
//- STATUS DA MENSAGEM ---------------------------------------------------------------------------
    public function statusMessage($status) 
    {
        if ($status == 'A')
            return 'Não Lida';
        else
            return 'Lida';
    }

//- SELECT DE USUÁRIOS ---------------------------------------------------------
    public static function usersForSelect() 
    {
        // $usersForSelect = User::distinct('name', 'id')
        $usersForSelect = User::select(DB::raw("CONCAT(name,' - ', cpf) AS name"),'id')
        ->where('id','<>', Auth::user()->id)
        ->pluck('name', 'id');

        if ($usersForSelect)
            return $usersForSelect;
        else
            Alert::error('Erro ao pesquisar usuários');
    }

}

