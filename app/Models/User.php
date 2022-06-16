<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Request;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    public    $timestamps   = true;
    protected $table        = 'users';
    protected $fillable     = [
        'cpf', 'name', 'email', 'password', 'avatar', 'block', 'assignment_id', 'path_signature', 'institute_id', 'tags'
    ];
    protected $hidden       = ['password', 'remember_token'];

    public static function boot()
    {
        // //parent::userRegister();
    }

    //- RELACIONAMENTO COM PERIFS (One to One) -----------------------------------------------
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    //- RELACIONAMENTO COM PERFIS (One to Many) ------------------------------
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles);
    }

    public function accesses()
    {
        return $this->hasMany(Access::class);
    }

    public function hasAnyRoles($roles)
    {
        if (is_array($roles) || is_object($roles)) {
            return !!$roles->intersect($this->roles)->count();
        }

        return $this->roles->contains('name', $roles);
    }

    //- RELACIONAMENTO COM FUNÇÕES (One to One) -----------------------------------------------
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    //- RELACIONAMENTO COM FUNÇÕES (One to Many) ------------------------------
    public function assignments()
    {
        return $this->belongsToMany(Assignment::class);
    }

    //- RELACIONAMENTO COM INSTITUIÇÕES (One to One) -----------------------------------------------
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    //- RELACIONAMENTO COM INSTITUIÇÕES (One to Many) ------------------------------
    public function institutes()
    {
        return $this->belongsToMany(Institute::class);
    }

    //- RELACIONAMENTO COM ÁREAS DE CONHECIMENTO (One to One) -----------------------------------------------
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    //- RELACIONAMENTO COM ÁREAS DE CONHECIMENTO (One to Many) ------------------------------
    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }


    //- SELECT DE PERFIS ---------------------------------------------------------
    public static function rolesForSelect()
    {
        $rolesForSelect = Role::distinct('name', 'id')
            ->get(['name', 'id',])
            ->pluck('name', 'id');

        if ($rolesForSelect)
            return $rolesForSelect;
        else
            Alert::error('Erro ao pesquisar perfis');
    }

    //- SELECT DE FUNÇÕES ---------------------------------------------------------
    public static function assignmentsForSelect()
    {
        $assignmentsForSelect = Assignment::distinct('name', 'id')
            ->get(['name', 'id',])
            ->pluck('name', 'id');

        if ($assignmentsForSelect)
            return $assignmentsForSelect;
        else
            Alert::error('Erro ao pesquisar funções');
    }

    //- SELECT DE INSTITUICÕES ---------------------------------------------------------
    public static function institutesForSelect()
    {
        $institutesForSelect = Institute::distinct('name', 'id')
            ->get(['name', 'id',])
            ->pluck('name', 'id');

        if ($institutesForSelect)
            return $institutesForSelect;
        else
            Alert::error('Erro ao pesquisar instituições');
    }

    //- SELECT DE INSTITUICÕES ---------------------------------------------------------
    public static function areasForSelect()
    {
        $areasForSelect = Area::distinct('name', 'id')
            ->get(['name', 'id',])
            ->pluck('name', 'id');

        if ($areasForSelect)
            return $areasForSelect;
        else
            Alert::error('Erro ao pesquisar áreas de conhecimento');
    }

    //- REGISTRA O LOGIN DO USUÁRIO ------------------------------------------------
    public function registerLogin()
    {
        return $this->accesses()->create([
            'user_id'   => $this->id,
            'datetime'  => date('YmdHis'),
            'ip'  => Request::ip(),
            'action'  => 'E',
        ]);
    }

    //- REGISTRA O LOGOUT DO USUÁRIO ------------------------------------------------
    public function registerLogout()
    {
        return $this->accesses()->create([
            'user_id'   => $this->id,
            'datetime'  => date('YmdHis'),
            'ip'  => Request::ip(),
            'action'  => 'S',
        ]);
    }

    //- PESQUISA DE USUÁRIOS -----------------------------------------------
    public function search(array $data, $totalPage)
    {
        if ($totalPage != null) {
            $users = $this->where(function ($query) use ($data) {
                if (isset($data['institute_id']))
                    $query->where('institute_id', $data['institute_id']);
                if (isset($data['assignment_id']))
                    $query->where('assignment_id', $data['assignment_id']);
                if (isset($data['texto'])) {
                    $query->Where('cpf', 'like', '%' . $data['texto'] . '%');
                    $query->OrWhere('name', 'like', '%' . $data['texto'] . '%');
                    $query->OrWhere('email', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->paginate($totalPage);
        } else {
            $users = $this->where(function ($query) use ($data) {
                if (isset($data['institute_id']))
                    $query->where('institute_id', $data['institute_id']);
                if (isset($data['assignment_id']))
                    $query->where('assignment_id', $data['assignment_id']);
                if (isset($data['texto'])) {
                    $query->Where('cpf', 'like', '%' . $data['texto'] . '%');
                    $query->OrWhere('name', 'like', '%' . $data['texto'] . '%');
                    $query->OrWhere('email', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->get();
        }
        return $users;
    }
}
