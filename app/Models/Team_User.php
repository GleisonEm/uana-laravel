<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team_User extends Model
{
    public $timestamps  = false;
    protected $table = 'team_user';
    protected $fillable = ['team_id, user_id'];


//- RELACIONAMENTO COM TURMAS (One to One) -----------------------------------------------
    public function team()
    {
        return $this->belongsTo(Team::class);
    }      

 //- RELACIONAMENTO COM TURMAS (One to Many) ------------------------------
    public function teams() 
    {
        return $this->belongsToMany(Team::class);
    }

//- RELACIONAMENTO COM USERS (One to One) -----------------------------------------------
    public function retorna_usuario($user_id)
    {
        $user = User::where('id', $user_id)
        ->get()->first();

        return $user['name'];
    }      

//- RELACIONAMENTO COM TURMAS (One to One) -----------------------------------------------
    public static function retorna_turma($team_id)
    {
        $team = Team::where('id', $team_id)
        ->get()->first();

        return $team->name;
    }      


}
