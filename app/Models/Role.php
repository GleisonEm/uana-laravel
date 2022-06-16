<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps  = true;
    protected $table = 'roles';
    protected $fillable = ['name', 'description'];

    public static function boot()
    {
        //parent::userRegister();
    }

    //- RELACIONAMENTO COM PERMISSÕES (One to Many) ------------------------------
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasAnyPermissions($permissions)
    {
        if (is_array($permissions) || is_object($permissions)) {
            return !!$permissions->intersect($this->permissions)->count();
        }

        return $this->permissions->contains('name', $permissions);
    }

    //- SELECT DE PERMISSÕES ---------------------------------------------------------------
    public static function permissionsForSelect()
    {
        $permissionsForSelect = Permission::distinct('name', 'id')
            ->get(['name', 'id',])
            ->pluck('name', 'id');

        if ($permissionsForSelect)
            return $permissionsForSelect;
        else
            Alert::error('Erro ao pesquisar permissões');
    }

    //- PESQUISA DE PERFIS -----------------------------------------------
    public function search(array $data, $totalPage)
    {
        if ($totalPage != null) {
            $roles = $this->where(function ($query) use ($data) {
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                    $query->OrWhere('description', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->paginate($totalPage);
        } else {
            $roles = $this->where(function ($query) use ($data) {
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                    $query->OrWhere('description', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->get();
        }
        return $roles;
    }
}
