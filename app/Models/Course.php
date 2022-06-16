<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps  = true;
    protected $table = 'courses';
    protected $fillable = ['name', 'institute_id'];

    public static function boot()
    {
        //parent::userRegister();
    }

    //- RELACIONAMENTO COM USUÁRIOS PROFESSORES (One to One) -----------------------------------------------
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //- RELACIONAMENTO COM USUÁRIOS PROFESSORES (One to Many) ------------------------------
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function hasAnyUsers($users)
    {
        if (is_array($users) || is_object($users)) {
            return !!$users->intersect($this->users)->count();
        }

        return $this->users->contains('name', $users);
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

    //- SELECT DE USUÁRIOS PROFESSORES ---------------------------------------------------------
    public static function usersForSelect()
    {
        $usersForSelect = User::distinct('name', 'id')
            ->where('assignment_id', '3')
            ->where('block', 'N')
            ->get(['name', 'id',])
            ->pluck('name', 'id');

        if ($usersForSelect)
            return $usersForSelect;
        else
            Alert::error('Erro ao pesquisar professores');
    }

    //- SELECT DE INSTITUTOS ---------------------------------------------------------
    public static function institutesForSelect()
    {
        $institutesForSelect = Institute::distinct('name', 'id')
            ->get(['name', 'id',])
            ->pluck('name', 'id');

        if ($institutesForSelect)
            return $institutesForSelect;
        else
            Alert::error('Erro ao pesquisar institutos');
    }

    //- PESQUISA DE CURSOS -----------------------------------------------
    public function search(array $data, $totalPage)
    {
        if ($totalPage != null) {
            $courses = $this->where(function ($query) use ($data) {
                if (isset($data['institute_id']))
                    $query->where('institute_id', $data['institute_id']);
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->paginate($totalPage);
        } else {
            $courses = $this->where(function ($query) use ($data) {
                if (isset($data['institute_id']))
                    $query->where('institute_id', $data['institute_id']);
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->get();
        }
        return $courses;
    }
}
