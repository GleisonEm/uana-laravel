<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Team extends Model
{
    public $timestamps  = true;
    protected $table = 'teams';
    protected $fillable = ['name', 'institute_id', 'course_id', 'user_id', 'key'];

    public static function boot()
    {
        //parent::userRegister();
    }

    //- RELACIONAMENTO COM INSTITUTOS (One to One) -----------------------------------------------
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    //- RELACIONAMENTO COM INSTITUTOS (One to Many) ------------------------------
    public function institutes()
    {
        return $this->belongsToMany(Institute::class);
    }

    //- RELACIONAMENTO COM CURSOS (One to One) -----------------------------------------------
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    //- RELACIONAMENTO COM CURSOS (One to Many) ------------------------------
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    //- RELACIONAMENTO COM USUÁRIOS (One to One) -----------------------------------------------
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //- RELACIONAMENTO COM CURSOS (One to Many) ------------------------------
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    //- SELECT DE INSTITUTOS ---------------------------------------------------------
    public static function institutesForSelect()
    {
        $institutesForSelect = Institute::distinct('name', 'id')
            ->where('id', Auth::user()->institute_id)
            ->get(['name', 'id',])
            ->pluck('name', 'id');

        if ($institutesForSelect)
            return $institutesForSelect;
        else
            Alert::error('Erro ao pesquisar institutos');
    }

    //- SELECT DE CURSOS ---------------------------------------------------------
    public static function coursesForSelect()
    {
        $coursesForSelect = Course::distinct('name', 'id')
            ->where('institute_id', Auth::user()->institute_id)
            ->get(['name', 'id',])
            ->pluck('name', 'id');

        if ($coursesForSelect)
            return $coursesForSelect;
        else
            Alert::error('Erro ao pesquisar cursos');
    }

    //- SELECT DE USUÁRIOS ---------------------------------------------------------
    public static function usersForSelect()
    {
        $usersForSelect = User::distinct('name', 'id')
            ->get(['name', 'id',])
            ->pluck('name', 'id');

        if ($usersForSelect)
            return $usersForSelect;
        else
            Alert::error('Erro ao pesquisar usuários');
    }

    //- PESQUISA DE TURMAS -----------------------------------------------
    public function search(array $data, $totalPage)
    {
        if ($totalPage != null) {
            $teams = $this->where(function ($query) use ($data) {
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->paginate($totalPage);
        } else {
            $teams = $this->where(function ($query) use ($data) {
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->get();
        }
        return $teams;
    }
}
